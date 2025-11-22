<?php

namespace App\Controllers\MasterAdmin;

use App\Controllers\BaseController;
use App\Models\DepartmentModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Database\Config;
use App\Models\RoleModel;
use App\Models\UserRoleDepartmentModel;


class MADashboardController extends BaseController //
{
    public function dashboardIndex(): string // Table 1
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

        // Fetch all users with their roles and departments using the view_user_roles_departments
        $db = \Config\Database::connect();
        $builder = $db->table('view_user_roles_departments');
        $data['users'] = $builder->get()->getResultArray();

        // Fetch all departments, categorized by type, for the filter dropdown
        $data['departments'] = [
            'Academic' => $departmentModel->where('dep_type', 'Academic')->findAll(),
            'Administrative' => $departmentModel->where('dep_type', 'Administrative')->findAll()
        ];
        
        return view('user-pages/master-admin/ma-dashboard', $data);
    }

    public function rolesDepIndex(): string // Table 2
    {
        $userModel = new UserModel();
        $roleModel = new RoleModel();
        $departmentModel = new DepartmentModel();

        $data['staffCount'] = $userModel->countUsersByType('Staff');
        $data['facultyMembersCount'] = $userModel->countUsersByType('Faculty');
        $data['allRoleCount'] = $roleModel->countAllResults();
        $data['allDepCount'] = $departmentModel->countAllResults();

        $db = \Config\Database::connect();
        $builder = $db->table('view_role_department');
        $data['rolesDepartments'] = $builder->get()->getResultArray();

        // Fetch all departments, categorized by type, for the filter dropdown
        $data['departments'] = [
            'Academic' => $departmentModel->where('dep_type', 'Academic')->findAll(),
            'Administrative' => $departmentModel->where('dep_type', 'Administrative')->findAll()
        ];

        return view('user-pages/master-admin/ma-rolesdep', $data);
    }

    public function createRoleDepartment(): ResponseInterface // Table 2
    {
        $roleModel = new RoleModel();

        $rules = [
            'role_name' => 'required|max_length[200]',
            'dep_id' => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $this->validator->getErrors()
            ]);
        }

        $roleName = $this->request->getPost('role_name');
        $depId = $this->request->getPost('dep_id');

        $insertData = [
            'role_name' => $roleName,
            'role_dep_id_fk' => $depId
        ];

        if ($roleModel->insert($insertData)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Role created successfully.',
                'role_id' => $roleModel->getInsertID() // Return the ID of the newly created role
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to create role.'
            ]);
        }
    }

    public function createDepartment(): ResponseInterface // Table 2 - Create New Department
    {
        $departmentModel = new DepartmentModel();

        $rules = [
            'dep_name' => 'required|max_length[200]',
            'dep_type' => 'required|in_list[Academic,Administrative]'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $this->validator->getErrors()
            ]);
        }

        $depName = $this->request->getPost('dep_name');
        $depType = $this->request->getPost('dep_type');

        // Check if department name already exists
        $existingDepartment = $departmentModel->where('dep_name', $depName)->first();
        if ($existingDepartment) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Department name already exists.'
            ]);
        }

        $insertData = [
            'dep_name' => $depName,
            'dep_type' => $depType
        ];

        if ($departmentModel->insert($insertData)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Department created successfully.',
                'dep_id' => $departmentModel->getInsertID(),
                'dep_name' => $depName,
                'dep_type' => $depType
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to create department.'
            ]);
        }
    }

    // public function userTypeIndex(): string // Table 3
    // {
    //     $departmentModel = new DepartmentModel();
    //     $userModel = new UserModel();
    //     $roleModel = new RoleModel();

    //     $data['staffCount'] = $userModel->where('user_type', 'Staff')->countAllResults();  //Staff Counter
    //     $data['facultyMembersCount'] = $userModel->where('user_type', 'Faculty')->countAllResults(); //Faculty Counter
    //     $data['allRoleCount'] = $roleModel->countAllResults();  //Role Counter
    //     $data['allDepCount'] = $departmentModel->countAllResults(); //Office Counter
        
    //     $data['officesCount'] = $departmentModel->where('dep_type', 'Administrative')->countAllResults(); //Administrative Office Counter
    //     $data['academicDepartmentsCount'] = $departmentModel->where('dep_type', 'Academic')->countAllResults(); //Academic Office Counter (Departments)

    //     // Fetch all users with their roles and departments using the view_user_department_type
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('view_user_department_type');
    //     $data['users'] = $builder->get()->getResultArray();

    //     // Fetch all departments, categorized by type, for the filter dropdown
    //     $data['departments'] = [
    //         'Academic' => $departmentModel->where('dep_type', 'Academic')->findAll(),
    //         'Administrative' => $departmentModel->where('dep_type', 'Administrative')->findAll()
    //     ];
        
    //     return view('user-pages/master-admin/ma-usertype', $data);
    // }

    // public function update(): ResponseInterface // Table 3
    // {
    //     $input = $this->request->getPost();

    //     // Validate input
    //     $rules = [
    //         'user_id' => 'required|integer',
    //         'department_id' => 'required|integer',
    //         'user_type' => 'required|in_list[Faculty,Staff]',
    //     ];

    //     if (!$this->validate($rules)) {
    //         return $this->response->setJSON([
    //             'status' => 'error',
    //             'message' => 'Validation failed.',
    //             'errors' => $this->validator->getErrors()
    //         ]);
    //     }

    //     $userId = $input['user_id'];
    //     $newDepartmentId = $input['department_id'];
    //     $newUserType = $input['user_type'];

    //     $userModel = new UserModel();
    //     $userRoleDepartmentModel = new UserRoleDepartmentModel();

    //     // Get current user details to find old department_id and current role_id
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('user_role_department_tbl');
    //     $currentUserAssignment = $builder->where('user_id', $userId)->get()->getRowArray();

    //     if (!$currentUserAssignment) {
    //         return $this->response->setJSON([
    //             'status' => 'error',
    //             'message' => 'User assignment not found.'
    //         ]);
    //     }
    //     $oldDepartmentId = $currentUserAssignment['department_id'];
    //     $currentRoleId = $currentUserAssignment['role_id'];

    //     $db->transBegin();

    //     try {
    //         // Update user_type in users_tbl
    //         $userModel->update($userId, ['user_type' => $newUserType]);

    //         // Update department_id in user_role_department_tbl
    //         // Delete the old assignment
    //         $userRoleDepartmentModel->where([
    //             'user_id' => $userId,
    //             'role_id' => $currentRoleId,
    //             'department_id' => $oldDepartmentId
    //         ])->delete();

    //         // Insert the new assignment
    //         $userRoleDepartmentModel->insert([
    //             'user_id' => $userId,
    //             'role_id' => $currentRoleId,
    //             'department_id' => $newDepartmentId
    //         ]);

    //         $db->transCommit();
    //         return $this->response->setJSON([
    //             'status' => 'success',
    //             'message' => 'User and department updated successfully.'
    //         ]);
    //     } catch (\Exception $e) {
    //         $db->transRollback();
    //         return $this->response->setJSON([
    //             'status' => 'error',
    //             'message' => 'Failed to update user and department: ' . $e->getMessage()
    //         ]);
    //     }
    // }

    public function roleAssignIndex(): string // Table 4
    {
        $departmentModel = new DepartmentModel();
        $userModel = new UserModel();
        $roleModel = new RoleModel();

        $data['staffCount'] = $userModel->where('user_type', 'Staff')->countAllResults();
        $data['facultyMembersCount'] = $userModel->where('user_type', 'Faculty')->countAllResults();
        $data['allRoleCount'] = $roleModel->countAllResults();
        $data['allDepCount'] = $departmentModel->countAllResults();
        $data['officesCount'] = $departmentModel->where('dep_type', 'Administrative')->countAllResults();
        $data['academicDepartmentsCount'] = $departmentModel->where('dep_type', 'Academic')->countAllResults();

        // Fetch all users with their roles and departments, ensuring we get the assignment ID
        $db = \Config\Database::connect();
        $builder = $db->table('users_tbl u');
        $builder->select('u.user_id, u.user_tupid, u.user_firstname, u.user_lastname, r.role_id, r.role_name, d.dep_id as department_id, d.dep_name, urd.id as assignment_id');
        $builder->join('user_role_department_tbl urd', 'u.user_id = urd.user_id', 'left');
        $builder->join('roles_tbl r', 'urd.role_id = r.role_id', 'left');
        $builder->join('departments_tbl d', 'urd.department_id = d.dep_id', 'left');
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
        
        $data['occupiedRoles'] = [];
        foreach ($assignedRoles as $assignment) {
            if (!empty($assignment['role_id'])) {
                $data['occupiedRoles'][$assignment['role_id']] = $assignment['user_id'];
            }
        }
        
        return view('user-pages/master-admin/ma-rolesassign', $data);
    }

    public function searchUsers(): ResponseInterface // Table 4
    {
        $input = $this->request->getVar('query');
        $userModel = new UserModel();
        
        $users = $userModel->like('user_firstname', $input)
                           ->orLike('user_lastname', $input)
                           ->select('user_id, user_firstname, user_lastname')
                           ->findAll(10); // Limit to 10 results for autocomplete

        return $this->response->setJSON($users);
    }

    public function createUserAssignment(): ResponseInterface // Table 4
    {
        $input = $this->request->getJSON();
        $userId = $input->userId;
        $newRoleId = $input->newRoleId;
        $newDepartmentId = $input->newDepartmentId;

        // --- Debugging Output Start ---
        // log_message('debug', 'Create User Assignment Request:');
        // log_message('debug', 'User ID: ' . $userId);
        // log_message('debug', 'New Role ID: ' . ($newRoleId ?? 'NULL'));
        // log_message('debug', 'New Department ID: ' . ($newDepartmentId ?? 'NULL'));
        // --- Debugging Output End ---

        // Validation
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
            // This is important because a user can only have 1 role per department (even if it's Nul)
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

    public function getRolesByDepartment($departmentId) // Table 4
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

    public function updateUserAssignment(): ResponseInterface // Table 4
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

    public function bulkUpdateRolesDepartments(): ResponseInterface
    {
        $this->db->transBegin();

        try {
            $rolesData = $this->request->getJSON(true);

            if (empty($rolesData)) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'No data received.']);
            }

            $roleModel = new RoleModel();

            foreach ($rolesData as $role) {
                // Basic validation for each role entry
                if (empty($role['role_id']) || empty($role['role_name']) || empty($role['dep_id'])) {
                    throw new \Exception('Invalid data for one or more roles. All fields are required.');
                }

                $updateData = [
                    'role_name' => esc($role['role_name']),
                    'role_dep_id_fk' => esc($role['dep_id'])
                ];

                if (!$roleModel->update($role['role_id'], $updateData)) {
                    // If any update fails, throw an exception to trigger a rollback
                    throw new \Exception('Failed to update role ID: ' . $role['role_id']);
                }
            }

            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
                return $this->response->setJSON(['status' => 'error', 'message' => 'Transaction failed.']);
            } else {
                $this->db->transCommit();
                return $this->response->setJSON(['status' => 'success', 'message' => 'Roles updated successfully.']);
            }

        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', 'Bulk update failed: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'An error occurred during the update: ' . $e->getMessage()]);
        }
    }

    public function bulkDeleteRoles(): ResponseInterface
    {
        $this->db->transBegin();

        try {
            $roleIds = $this->request->getJSON(true);

            if (empty($roleIds)) {
                // It's not an error if there's nothing to delete.
                return $this->response->setJSON(['status' => 'success', 'message' => 'No roles were marked for deletion.']);
            }

            $roleModel = new RoleModel();
            
            // First, nullify parent references to avoid foreign key constraints
            $roleModel->whereIn('role_parent_role_id', $roleIds)->set(['role_parent_role_id' => null])->update();

            // Now, delete the roles
            if (!$roleModel->delete($roleIds)) {
                throw new \Exception('Failed to delete one or more roles.');
            }

            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
                return $this->response->setJSON(['status' => 'error', 'message' => 'Transaction failed during deletion.']);
            } else {
                $this->db->transCommit();
                return $this->response->setJSON(['status' => 'success', 'message' => 'Roles deleted successfully.']);
            }

        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', 'Bulk delete failed: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'An error occurred during deletion: ' . $e->getMessage()]);
        }
    }

    public function bulkDeleteDepartments(): ResponseInterface
    {
        $this->db->transBegin();

        try {
            $depIds = $this->request->getJSON(true);

            if (empty($depIds)) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'No departments were marked for deletion.']);
            }

            $roleModel = new RoleModel();
            $departmentModel = new DepartmentModel();
            $userRoleDepartmentModel = new UserRoleDepartmentModel();

            // 1. Find all roles that are going to be deleted.
            $rolesToDelete = $roleModel->whereIn('role_dep_id_fk', $depIds)->findColumn('role_id');

            if (!empty($rolesToDelete)) {
                // 2. Nullify parent references for any roles that have one of the soon-to-be-deleted roles as a parent.
                $roleModel->whereIn('role_parent_role_id', $rolesToDelete)->set(['role_parent_role_id' => null])->update();
            }
            
            // 3. Delete all user assignments related to the departments to be deleted.
            $userRoleDepartmentModel->whereIn('department_id', $depIds)->delete();

            // 4. Delete all roles associated with the given departments.
            if (!empty($rolesToDelete)) {
                $roleModel->whereIn('role_id', $rolesToDelete)->delete();
            }

            // 5. Now, delete the departments themselves.
            if (!$departmentModel->delete($depIds)) {
                throw new \Exception('Failed to delete one or more departments.');
            }

            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
                return $this->response->setJSON(['status' => 'error', 'message' => 'Transaction failed during department deletion.']);
            } else {
                $this->db->transCommit();
                return $this->response->setJSON(['status' => 'success', 'message' => 'Departments and their roles deleted successfully.']);
            }

        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', 'Bulk department delete failed: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'An error occurred during department deletion: ' . $e->getMessage()]);
        }
    }

    public function bulkSaveUserAssignments(): ResponseInterface
    {
        $this->db->transBegin();

        try {
            $payload = $this->request->getJSON(true);
            $newAssignments = $payload['newAssignments'] ?? [];
            $updatedAssignments = $payload['updatedAssignments'] ?? [];

            $userRoleDepartmentModel = new UserRoleDepartmentModel();

            // Handle New Assignments
            if (!empty($newAssignments)) {
                foreach ($newAssignments as $assignment) {
                    if (empty($assignment['userId']) || empty($assignment['departmentId'])) {
                        throw new \Exception('Invalid data for new assignment.');
                    }
                    $data = [
                        'user_id' => $assignment['userId'],
                        'department_id' => $assignment['departmentId'],
                        'role_id' => empty($assignment['roleId']) ? null : $assignment['roleId'],
                    ];
                    if (!$userRoleDepartmentModel->insert($data)) {
                        throw new \Exception('Failed to create a new user assignment.');
                    }
                }
            }

            // Handle Updated Assignments
            if (!empty($updatedAssignments)) {
                foreach ($updatedAssignments as $update) {
                    if (empty($update['newDepartmentId'])) {
                        throw new \Exception('Invalid data for updated assignment. New Department ID is required.');
                    }

                    $updateData = [
                        'department_id' => $update['newDepartmentId'],
                        'role_id' => $update['newRoleId'],
                    ];

                    // Check if an assignmentId was provided and exists
                    if (!empty($update['assignmentId']) && $userRoleDepartmentModel->find($update['assignmentId'])) {
                        // If it exists, update it
                        if (!$userRoleDepartmentModel->update($update['assignmentId'], $updateData)) {
                            throw new \Exception('Failed to update assignment for assignment ID: ' . $update['assignmentId']);
                        }
                    } else {
                        // If it does not exist, create a new one. This handles users who were not in the table.
                        // We need the user_id for this, which we must have passed from the frontend.
                        if (empty($update['userId'])) {
                            throw new \Exception('User ID is required to create a new assignment for an unlisted user.');
                        }
                        $newData = [
                            'user_id' => $update['userId'],
                            'department_id' => $update['newDepartmentId'],
                            'role_id' => $update['newRoleId'],
                        ];
                        if (!$userRoleDepartmentModel->insert($newData)) {
                            throw new \Exception('Failed to create new assignment for user ID: ' . $update['userId']);
                        }
                    }
                }
            }

            if ($this->db->transStatus() === false) {
                throw new \Exception('Database transaction failed.');
            }

            $this->db->transCommit();
            return $this->response->setJSON(['status' => 'success', 'message' => 'All assignments saved successfully.']);

        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', 'Bulk assignment save failed: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
