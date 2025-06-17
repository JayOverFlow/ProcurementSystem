<?php

namespace App\Controllers\MasterAdmin;

use App\Controllers\BaseController;
use App\Models\MasterAdmin\DepartmentModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Database\Config;

class MADashboard extends BaseController
{
    public function index()
    {
        $departmentModel = new DepartmentModel();
        $userModel = new UserModel();

        $data['departments'] = $departmentModel->getAllDepartments();

        // Fetch counts for the dashboard cards
        $data['officesCount'] = $departmentModel->countDepartmentsByType('Administrative');
        $data['academicDepartmentsCount'] = $departmentModel->countDepartmentsByType('Academic');
        $data['facultyMembersCount'] = $userModel->countUsersByType('Faculty');
        $data['staffCount'] = $userModel->countUsersByType('Staff');

        // Fetch user data along with their roles and departments from the new view
        $usersData = \Config\Database::connect()->table('user_department_view')->get()->getResultArray();
        $data['users'] = $usersData;

        return view('user-pages/master-admin/ma-dashboard', $data);
    }
}
