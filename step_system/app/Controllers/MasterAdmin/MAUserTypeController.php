<?php

namespace App\Controllers\MasterAdmin;

use App\Controllers\BaseController;
use App\Models\MasterAdmin\DepartmentModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Database\Config;
use App\Models\MasterAdmin\RoleModel;
use App\Models\MasterAdmin\UserRoleDepartmentModel;

class MAUserTypeController extends BaseController
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

        // Fetch all users with their roles and departments using the view_user_department_type
        $db = \Config\Database::connect();
        $builder = $db->table('view_user_department_type');
        $data['users'] = $builder->get()->getResultArray();

        // Fetch all departments, categorized by type, for the filter dropdown
        $data['departments'] = [
            'Academic' => $departmentModel->where('dep_type', 'Academic')->findAll(),
            'Administrative' => $departmentModel->where('dep_type', 'Administrative')->findAll()
        ];
        
        return view('user-pages/master-admin/ma-usertype', $data);
    }

    public function update(): ResponseInterface
    {
        $input = $this->request->getPost();

        // Validate input
        $rules = [
            'user_id' => 'required|integer',
            'department_id' => 'required|integer',
            'user_type' => 'required|in_list[Faculty,Staff]',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $this->validator->getErrors()
            ]);
        }

        $userId = $input['user_id'];
        $newDepartmentId = $input['department_id'];
        $newUserType = $input['user_type'];

        $userModel = new UserModel();
        $userRoleDepartmentModel = new UserRoleDepartmentModel();

        // Get current user details to find old department_id and current role_id
        // This is crucial because user_role_department_tbl has a composite primary key.
        $db = \Config\Database::connect();
        $builder = $db->table('user_role_department_tbl');
        $currentUserAssignment = $builder->where('user_id', $userId)->get()->getRowArray();

        if (!$currentUserAssignment) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'User assignment not found.'
            ]);
        }
        $oldDepartmentId = $currentUserAssignment['department_id'];
        $currentRoleId = $currentUserAssignment['role_id'];

        $db->transBegin();

        try {
            // Update user_type in users_tbl
            $userModel->update($userId, ['user_type' => $newUserType]);

            // Update department_id in user_role_department_tbl
            // Delete the old assignment
            $userRoleDepartmentModel->where([
                'user_id' => $userId,
                'role_id' => $currentRoleId,
                'department_id' => $oldDepartmentId
            ])->delete();

            // Insert the new assignment
            $userRoleDepartmentModel->insert([
                'user_id' => $userId,
                'role_id' => $currentRoleId,
                'department_id' => $newDepartmentId
            ]);

            $db->transCommit();
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'User and department updated successfully.'
            ]);
        } catch (\Exception $e) {
            $db->transRollback();
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to update user and department: ' . $e->getMessage()
            ]);
        }
    }
}
