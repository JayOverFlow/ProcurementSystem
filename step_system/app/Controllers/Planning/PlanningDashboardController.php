<?php

namespace App\Controllers\Planning;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\UserRoleDepartmentModel;
use App\Models\DepartmentBudgetModel;


class PlanningDashboardController extends BaseController
{

    protected $userModel;
    protected $userRoleDepartmentModel;
    protected $departmentBudgetModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userRoleDepartmentModel = new UserRoleDepartmentModel();
        $this->departmentBudgetModel = new DepartmentBudgetModel();
    }   

    public function index()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();
        $currentUserId = $userData['user_id'];
        $departmentId = $userData['user_dep_id'];

        // Get dashboard data
        $dashboardData = [
            'procurement_status' => null,
            'faculty_count' => $this->userModel->getFacultyCountByDepartment($departmentId),
            'staff_count' => $this->userModel->getStaffCountByDepartment($departmentId),
            'department_budget' => $this->departmentBudgetModel->getBudgetByDepartmentAndYear($departmentId, date('Y')),
            'subordinates' => $this->userRoleDepartmentModel->getUsersInSameDepartment($currentUserId, $departmentId)
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
