<?php

namespace App\Controllers\Planning;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\UserRoleDepartmentModel;


class PlanningDashboardController extends BaseController
{

    protected $userModel;
    protected $userRoleDepartmentModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userRoleDepartmentModel = new UserRoleDepartmentModel();
    }   

    public function index()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Get dashboard data
        $dashboardData = [
            'procurement_status' => null,
            'faculty_count' => $this->userModel->getAllFacultyCount(),
            'staff_count' => $this->userModel->getAllStaffCount(),  
            'subordinates' => null  
        ];

        // Store data
        $data = [
            'user_data' => $userData,
            'dashboard_data' => $dashboardData
        ];

        // Return view with stored data
        return view('user-pages/planning/plan-dashboard', $data);
    }
}
