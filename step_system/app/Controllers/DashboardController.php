<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\UserRoleDepartmentModel;
use App\Models\DepartmentBudgetModel;

class DashboardController extends BaseController
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
        // Get user data via session
        $userData = $this->loadUserSession();

        // Get user gen_role to identify kung anong data yung need niya for dashboard
        $userGenRole = $userData['gen_role'];


        switch ($userGenRole) {
            // If the user is Director 
            case "Director":
                // Fetch the necessary data to pass to director dashboard
                $dashboardData = [
                    'procurement_status' => null,
                    'faculty_count' => $this->userModel->getFacultyCountByDepartment($userData['user_dep_id']), // Argument: dep_id ng logged in user
                    'staff_count' => $this->userModel->getStaffCountByDepartment($userData['user_dep_id']),
                    'department_budget' => $this->departmentBudgetModel->getBudgetByDepartmentAndYear($userData['user_dep_id'], date('Y')),
                    'subordinates' => $this->userRoleDepartmentModel->getUsersInSameDepartment($userData['user_id'], $userData['user_dep_id']) // Arguments: user_id at dep_id ng logged in user
                ];
                
                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'dashboard_data' => $dashboardData
                ];
                 
                // Redirect user sa dashboard page niya with pass data with contains the necessary data to render to dashboard
                return view('user-pages/director/dir-dashboard', $data);
                break;
            case "Head":
                // 1. Fetch the necessary data to pass to dashboard
                // 2. Store user data and dashbaord data
                // 3. Redirect using return view('[user-dashboard-page]', data)
                break;
            case "Planning Officer":
                // 1. Fetch the necessary data to pass to dashboard
                // 2. Store user data and dashbaord data
                // 3. Redirect using return view('[user-dashboard-page]', data)
                break;
            case "Supply":
                // 1. Fetch the necessary data to pass to dashboard
                // 2. Store user data and dashbaord data
                // 3. Redirect using return view('[user-dashboard-page]', data)
                break;
            case "Procurement":
                // 1. Fetch the necessary data to pass to dashboard
                // 2. Store user data and dashbaord data
                // 3. Redirect using return view('[user-dashboard-page]', data)
                break;
            case "Faculty": // = Section Head
                // 1. Fetch the necessary data to pass to dashboard
                // 2. Store user data and dashbaord data
                // 3. Redirect using return view('[user-dashboard-page]', data)
                break;
            case null: // = Unassigned users
                // 1. Fetch the necessary data to pass to dashboard
                // 2. Store user data and dashbaord data
                // 3. Redirect using return view('[user-dashboard-page]', data)
                break;
              default:
                // 404 page dapat toh haha
        }

        // NOTE: Change the route calls sa lahat nav ng user
        // Read dir-nav.php for reference
        
    }
}
