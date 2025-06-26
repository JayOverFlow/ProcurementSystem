<?php

namespace App\Controllers\MasterAdmin;

use App\Controllers\BaseController;
use App\Models\MasterAdmin\DepartmentModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Database\Config;
use App\Models\MasterAdmin\RoleModel;

class MARolesDepController extends BaseController // Controller for Roles & Departments Table
{
    public function index(): string
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
    public function updateRoleDepartment(): ResponseInterface
    {
        $roleModel = new RoleModel();

        $rules = [
            'role_id' => 'required|integer',
            'role_name' => 'required|max_length[200]',
            'dep_id' => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $this->validator->getErrors()
            ]);
        }

        $roleId = $this->request->getPost('role_id');
        $roleName = $this->request->getPost('role_name');
        $depId = $this->request->getPost('dep_id');

        // Update the role in the database
        $updateData = [
            'role_name' => $roleName,
            'role_dep_id_fk' => $depId
        ];

        if ($roleModel->update($roleId, $updateData)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Role updated successfully.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to update role.'
            ]);
        }
    }

    public function createRoleDepartment(): ResponseInterface
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
}
