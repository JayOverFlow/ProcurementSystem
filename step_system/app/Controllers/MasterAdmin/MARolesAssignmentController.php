<?php

namespace App\Controllers\MasterAdmin;

use App\Controllers\BaseController;
use App\Models\MasterAdmin\DepartmentModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Database\Config;
use App\Models\MasterAdmin\RoleModel;
use App\Models\MasterAdmin\UserRoleDepartmentModel;

class MARolesAssignmentController extends BaseController
{
    public function index(): string
    {
        $departmentModel = new DepartmentModel();
        $userModel = new UserModel();
        $roleModel = new RoleModel();

        $data['staffCount'] = $userModel->where('user_type', 'Staff')->countAllResults();  //Staff Counter
        $data['facultyMembersCount'] = $userModel->where('user_type', 'Faculty')->countAllResults(); //Faculty Counter
        $data['allRoleCount'] = $roleModel->countAllResults();  //Role Counter
        $data['allDepCount'] = $departmentModel->countAllResults(); //Office Counter
        
        $data['officesCount'] = $departmentModel->where('dep_type', 'Administrative')->countAllResults(); //Administrative Office Counter
        $data['academicDepartmentsCount'] = $departmentModel->where('dep_type', 'Academic')->countAllResults(); //Academic Office Counter (Departments)

        // Fetch all users with their roles and departments using the view_users_for_role_assignment
        $db = \Config\Database::connect();
        $builder = $db->table('view_users_for_role_assignment');
        $data['users'] = $builder->get()->getResultArray();

        // Fetch all departments, categorized by type, for the filter dropdown
        $data['departments'] = [
            'Academic' => $departmentModel->where('dep_type', 'Academic')->findAll(),
            'Administrative' => $departmentModel->where('dep_type', 'Administrative')->findAll()
        ];
        
        // Fetch all departments for the edit dropdown
        $data['allDepartments'] = $departmentModel->findAll();

        // Fetch all currently assigned role IDs to disable them in the dropdown for other users
        $userRoleDepartmentModel = new UserRoleDepartmentModel();
        $assignedRoles = $userRoleDepartmentModel->select(['role_id', 'user_id'])->findAll();
        
        // Create an associative array where role_id is key and user_id is value
        // This helps to quickly check if a role is assigned and by which user
        $data['occupiedRoles'] = [];
        foreach ($assignedRoles as $assignment) {
            $data['occupiedRoles'][$assignment['role_id']] = $assignment['user_id'];
        }
        
        return view('user-pages/master-admin/ma-rolesassign', $data);
    }

    public function searchUsers(): ResponseInterface
    {
        $input = $this->request->getVar('query');
        $userModel = new UserModel();
        
        $users = $userModel->like('user_firstname', $input)
                           ->orLike('user_lastname', $input)
                           ->select('user_id, user_firstname, user_lastname')
                           ->findAll(10); // Limit to 10 results for autocomplete

        return $this->response->setJSON($users);
    }

    public function createUserAssignment(): ResponseInterface
    {
        $input = $this->request->getJSON();
        $userId = $input->userId;
        $newRoleId = $input->newRoleId;
        $newDepartmentId = $input->newDepartmentId;

        // --- Debugging Output Start ---
        log_message('debug', 'Create User Assignment Request:');
        log_message('debug', 'User ID: ' . $userId);
        log_message('debug', 'New Role ID: ' . ($newRoleId ?? 'NULL'));
        log_message('debug', 'New Department ID: ' . ($newDepartmentId ?? 'NULL'));
        // --- Debugging Output End ---

        // Basic validation
        if (empty($userId) || empty($newDepartmentId)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'User and Department are required.']);
        }
        
        // Ensure that if a role is provided, it's not empty string
        if ($newRoleId === '') {
            $newRoleId = null;
        }

        // Start a database transaction
        $this->db->transBegin();

        try {
            // Check for existing assignment for this user in this department
            // This is important because a user can only have ONE role per department (even if it's NULL)
            $userRoleDepartmentModel = new UserRoleDepartmentModel();
            $existingAssignment = $userRoleDepartmentModel->where('user_id', $userId)
                                                          ->where('department_id', $newDepartmentId)
                                                          ->first();

            if ($existingAssignment) {
                // If an assignment already exists for this user in this department, update it
                $data = ['role_id' => $newRoleId];
                $userRoleDepartmentModel->update($existingAssignment['id'], $data);
                log_message('debug', 'Existing assignment for user ' . $userId . ' in department ' . $newDepartmentId . ' updated.');
            } else {
                // If no existing assignment, create a new one
                $data = [
                    'user_id' => $userId,
                    'role_id' => $newRoleId,
                    'department_id' => $newDepartmentId
                ];
                $userRoleDepartmentModel->insert($data);
                log_message('debug', 'New assignment created for user ' . $userId . ' in department ' . $newDepartmentId . '.');
            }

            $this->db->transCommit();
            return $this->response->setJSON(['status' => 'success', 'message' => 'User assignment created successfully.']);
        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', 'User assignment creation failed: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'Database Error: ' . $e->getMessage()]);
        }
    }

    public function getRolesByDepartment($departmentId)
    {
        $roleModel = new RoleModel();
        $roles = $roleModel->where('role_dep_id_fk', $departmentId)->distinct()->findAll();

        // Also fetch occupied roles for this department to pass to the view
        $userRoleDepartmentModel = new UserRoleDepartmentModel();
        $assignedRolesInDepartment = $userRoleDepartmentModel->select(['role_id', 'user_id'])
                                                              ->where('department_id', $departmentId)
                                                              ->findAll();
        $occupiedRolesData = [];
        foreach ($assignedRolesInDepartment as $assignment) {
            $occupiedRolesData[$assignment['role_id']] = $assignment['user_id'];
        }

        return $this->response->setJSON([
            'roles' => $roles,
            'occupiedRoles' => $occupiedRolesData
        ]);
    }

    public function updateUserAssignment(): ResponseInterface
    {
        $input = $this->request->getJSON();
        $userId = $input->userId;
        $oldRoleId = $input->oldRoleId;
        $oldDepartmentId = $input->oldDepartmentId;
        $newRoleId = $input->newRoleId;
        $newDepartmentId = $input->newDepartmentId;

        // Normalize empty strings to null for consistent handling with database NULLs
        if ($oldRoleId === '') $oldRoleId = null;
        if ($newRoleId === '') $newRoleId = null;
        if ($oldDepartmentId === '') $oldDepartmentId = null; // Should not happen based on frontend, but good practice
        if ($newDepartmentId === '') $newDepartmentId = null; // Should not happen based on frontend, but good practice

        // --- Debugging Output Start ---
        log_message('debug', 'Update User Assignment Request (Normalized):');
        log_message('debug', 'User ID: ' . $userId);
        log_message('debug', 'Old Role ID: ' . ($oldRoleId === null ? 'NULL' : $oldRoleId));
        log_message('debug', 'Old Department ID: ' . ($oldDepartmentId === null ? 'NULL' : $oldDepartmentId));
        log_message('debug', 'New Role ID: ' . ($newRoleId === null ? 'NULL' : $newRoleId));
        log_message('debug', 'New Department ID: ' . ($newDepartmentId === null ? 'NULL' : $newDepartmentId));
        // --- Debugging Output End ---

        // Start a database transaction
        $this->db->transBegin();

        try {
            $userRoleDepartmentModel = new UserRoleDepartmentModel();
            
            // First, find the existing assignment based on user_id and old department/role.
            // This is to get the primary key 'id' for update/delete.
            $existingAssignmentQuery = $userRoleDepartmentModel->where('user_id', $userId)
                                                                ->where('department_id', $oldDepartmentId);
            
            // Handle oldRoleId being NULL specifically
            if ($oldRoleId === null) {
                $existingAssignmentQuery->where('role_id IS NULL');
            } else {
                $existingAssignmentQuery->where('role_id', $oldRoleId);
            }

            $existingAssignment = $existingAssignmentQuery->first();

            if ($existingAssignment) {
                // If a record exists, we either update it or delete it.
                if ($newRoleId === null && $newDepartmentId === null) {
                    // Case 1: User is being completely unassigned. Delete the record.
                    $userRoleDepartmentModel->delete($existingAssignment['id']);
                    log_message('debug', 'User ID ' . $userId . ' completely unassigned by deleting existing record.');
                } elseif ($newDepartmentId !== null) {
                    // Case 2: User is being assigned to a new role/department, or to the same department with a different/null role.
                    // Update the existing record.
                    $data = [
                        'role_id' => $newRoleId,
                        'department_id' => $newDepartmentId // This might be the same as old, but ensures consistency
                    ];
                    $userRoleDepartmentModel->update($existingAssignment['id'], $data);
                    log_message('debug', 'Existing assignment for user ' . $userId . ' updated to New Role ID: ' . ($newRoleId === null ? 'NULL' : $newRoleId) . ' in Department ID: ' . $newDepartmentId . '.');
                } else {
                    // This case should ideally be prevented by frontend: newDepartmentId is null but newRoleId is not null
                    throw new \Exception("Invalid assignment combination: Cannot assign a role without a department.");
                }
            } else {
                // No existing record found for the old assignment.
                // This could happen if the user was previously unassigned, or if there's a data mismatch.
                // In this scenario, we should ONLY proceed if we are creating a *new* assignment.
                if ($newRoleId !== null && $newDepartmentId !== null) {
                    // Case 3: Create a brand new assignment for a user who had no previous specific assignment or if old data was wrong.
                    $data = [
                        'user_id' => $userId,
                        'role_id' => $newRoleId,
                        'department_id' => $newDepartmentId
                    ];
                    $userRoleDepartmentModel->insert($data);
                    log_message('debug', 'No existing assignment found. New assignment created for user ' . $userId . ' with New Role ID: ' . ($newRoleId === null ? 'NULL' : $newRoleId) . ' in Department ID: ' . $newDepartmentId . '.');
                } elseif ($newRoleId === null && $newDepartmentId !== null) {
                    // Attempt to assign user to a department with a NULL role, but no existing record was found.
                    // Due to UNIQUE KEY `uq_role_department` (`role_id`,`department_id`) this would fail if another NULL exists.
                    // And it means user wants to assign to a department with NULL role, but this specific (user, dep, NULL role) 
                    // combination doesn't exist. This can be handled by an INSERT.
                    // If it violates the unique constraint, the catch block will handle it.
                    $data = [
                        'user_id' => $userId,
                        'role_id' => null, // Explicitly null
                        'department_id' => $newDepartmentId
                    ];
                    $userRoleDepartmentModel->insert($data);
                    log_message('debug', 'No existing assignment found. New NULL role assignment created for user ' . $userId . ' in Department ID: ' . $newDepartmentId . '.');

                } else {
                    // This means trying to update when no old assignment found, but new assignment is also null/incomplete.
                    // This is an invalid scenario for an "update" operation.
                    throw new \Exception("No existing assignment to update and no valid new assignment provided.");
                }
            }

            $this->db->transCommit();
            return $this->response->setJSON(['status' => 'success', 'message' => 'User assignment updated successfully.']);
        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', 'User assignment update failed: ' . $e->getMessage());
            // Check for specific unique key constraint violation
            if (strpos($e->getMessage(), 'Duplicate entry') !== false && strpos($e->getMessage(), 'for key \'uq_role_department\'') !== false) {
                 return $this->response->setJSON(['status' => 'error', 'message' => 'Error: This role is already assigned to another user in this department, or a user with no specific role is already assigned to this department.']);
            }
            return $this->response->setJSON(['status' => 'error', 'message' => 'Database Error: ' . $e->getMessage()]);
        }
    }
}
