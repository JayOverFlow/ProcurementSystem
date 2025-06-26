<?php

namespace App\Controllers\MasterAdmin;

use App\Controllers\BaseController;
use App\Models\MasterAdmin\DepartmentModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Database\Config;
use App\Models\MasterAdmin\RoleModel;

class MADashboardController extends BaseController // Controller for Users table
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
}
