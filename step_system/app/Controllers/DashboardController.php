<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\UserRoleDepartmentModel;
use App\Models\DepartmentBudgetModel;
use App\Models\MrItemModel;

class DashboardController extends BaseController
{

    protected $userModel;
    protected $userRoleDepartmentModel;
    protected $departmentBudgetModel;
    protected $mrItemModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userRoleDepartmentModel = new UserRoleDepartmentModel();
        $this->departmentBudgetModel = new DepartmentBudgetModel();
        $this->mrItemModel = new MrItemModel();
    }

    public function index()
    {
        // Get user data via session
        $userData = $this->loadUserSession();
        $currentUserId = $userData['user_id'];
        $departmentId = $userData['user_dep_id'];

        // Get user gen_role to identify kung anong data yung need niya for dashboard
        $userGenRole = $userData['gen_role'];


        switch ($userGenRole) {
            // If the user is Director 
            case "Director":
                // Fetch the necessary data to pass to director dashboard
                $dashboardData = [
                    'procurement_status' => null,
                    'faculty_count' => $this->userModel->getFacultyCountByDepartment($departmentId),
                    'staff_count' => $this->userModel->getStaffCountByDepartment($departmentId),
                    'department_budget' => $this->departmentBudgetModel->getBudgetByDepartmentAndYear($departmentId, date('Y')),
                    'subordinates' => $this->userRoleDepartmentModel->getUsersInSameDepartment($currentUserId, $departmentId)
                ];
                
                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'dashboard_data' => $dashboardData,
                    'user_department_id' => $departmentId // Pass department ID to the view
                ];
                 
                // Redirect user sa dashboard page niya with pass data with contains the necessary data to render to dashboard
                return view('user-pages/director/dir-dashboard', $data);
                break;

            case "Head":
                // Fetch the necessary data to pass to dashboard
                $dashboardData = [
                    'procurement_status' => null,
                    'faculty_count' => $this->userModel->getFacultyCountByDepartment($departmentId),
                    'staff_count' => $this->userModel->getStaffCountByDepartment($departmentId),
                    'department_budget' => $this->departmentBudgetModel->getBudgetByDepartmentAndYear($departmentId, date('Y')),
                    'subordinates' => $this->userRoleDepartmentModel->getUsersInSameDepartment($currentUserId, $departmentId)
                ];

                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'dashboard_data' => $dashboardData,
                    'user_department_id' => $departmentId // Pass department ID to the view
                ];
                // Redirect using return view('[user-dashboard-page]', data)
                return view('user-pages/head/head-dashboard', $data);
                break;

            case "Planning Officer":
                // Fetch the necessary data to pass to dashboard
                $dashboardData = [
                    'procurement_status' => null,
                    'faculty_count' => $this->userModel->getFacultyCountByDepartment($departmentId),
                    'staff_count' => $this->userModel->getStaffCountByDepartment($departmentId),
                    'department_budget' => $this->departmentBudgetModel->getBudgetByDepartmentAndYear($departmentId, date('Y')),
                    'subordinates' => $this->userRoleDepartmentModel->getUsersInSameDepartment($currentUserId, $departmentId)
                ];

                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'dashboard_data' => $dashboardData,
                    'user_department_id' => $departmentId // Pass department ID to the view
                ];
                // Redirect using return view('[user-dashboard-page]', data)
                return view('user-pages/planning/plan-dashboard', $data);
                break;

            case "Supply":
                // Fetch the necessary data to pass to dashboard
                $dashboardData = [
                    'procurement_status' => null,
                    'faculty_count' => $this->userModel->getFacultyCountByDepartment($departmentId),
                    'staff_count' => $this->userModel->getStaffCountByDepartment($departmentId),
                    'department_budget' => $this->departmentBudgetModel->getBudgetByDepartmentAndYear($departmentId, date('Y')),
                    'subordinates' => $this->userRoleDepartmentModel->getUsersInSameDepartment($currentUserId, $departmentId)
                ];

                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'dashboard_data' => $dashboardData,
                    'user_department_id' => $departmentId // Pass department ID to the view
                ];
                // Redirect using return view('[user-dashboard-page]', data)
                return view('user-pages/supply/sup-dashboard', $data);

                break;

            case "Procurement":
                // Fetch the necessary data to pass to dashboard
                $dashboardData = [
                    'procurement_status' => null,
                    'faculty_count' => $this->userModel->getFacultyCountByDepartment($departmentId),
                    'staff_count' => $this->userModel->getStaffCountByDepartment($departmentId),
                    'department_budget' => $this->departmentBudgetModel->getBudgetByDepartmentAndYear($departmentId, date('Y')),
                    'subordinates' => $this->userRoleDepartmentModel->getUsersInSameDepartment($currentUserId, $departmentId)
                ];
                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'dashboard_data' => $dashboardData,
                    'user_department_id' => $departmentId // Pass department ID to the view
                ];
                // Redirect using return view('[user-dashboard-page]', data)
                return view('user-pages/procurement/pro-dashboard', $data);
                break;

            case "Faculty": // = Section Head
                // Fetch the necessary data to pass to dashboard
                    $mrItems = $this->mrItemModel->getMrItemsByUserId($userData['user_id']);
                    
                // Store user data and dashbaord data
                    $data = [
                        'user_data' => $userData,
                        'mr_items' => $mrItems,
                        'user_department_id' => $departmentId // Pass department ID
                    ];
                // Redirect using return view('[user-dashboard-page]', data)
                    return view('user-pages/faculty/fac-dashboard', $data);
                break;

            case null: // = Unassigned users
                // Fetch the necessary data to pass to dashboard
                $mrItems = $this->mrItemModel->getMrItemsByUserId($userData['user_id']);

                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'mr_items' => $mrItems,
                    'user_department_id' => $departmentId // Pass department ID
                ];

                // Redirect using return view('[user-dashboard-page]', data)
                return view('user-pages/unassigned/unassigned-dashboard', $data);

                break;

              default:
                // 404 page dapat toh haha
        }

        // NOTE: Change the route calls sa lahat nav ng user
        // Read dir-nav.php for reference
        
    }
}
