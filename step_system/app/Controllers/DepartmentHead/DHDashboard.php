<?php

namespace App\Controllers\DepartmentHead;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class DHDashboard extends BaseController {

    public function index()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();
        
        // Get users under the same department as the Department Head
        $userModel = new UserModel();
        $departmentUsers = [];
        if (isset($userData['user_dep_id'])) {
            $departmentUsers = $userModel->getUsersByDepartmentId($userData['user_dep_id']);
        }

        // Store data
        $data = [
            'user_data' => $userData,
            'department_users' => $departmentUsers
        ];

        // We should return page with user data from database
        return view('user-pages/head/head-dashboard', $data);
    }


    public function tasks()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ]; 

        return view('user-pages/head/head-tasks', $data);
    }

    public function mr()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];

        return view('user-pages/head/head-mr', $data) ;
    }

    public function ppmp()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];

        return view('user-pages/head/head-ppmp', $data);
    }

    public function pr()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];

        return view('user-pages/head/head-pr', $data);
    }
    public function app()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];

        return view('user-pages/head/head-app', $data);
    }

}
