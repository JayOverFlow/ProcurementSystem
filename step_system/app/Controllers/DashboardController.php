<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\UserRoleDepartmentModel;
use App\Models\TaskModel;
use App\Models\DepartmentBudgetModel;
use App\Models\MrItemModel;

class DashboardController extends BaseController
{

    protected $userModel;
    protected $userRoleDepartmentModel;
    protected $departmentBudgetModel;
    protected $mrItemModel;
    protected $taskModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userRoleDepartmentModel = new UserRoleDepartmentModel();
        $this->departmentBudgetModel = new DepartmentBudgetModel();
        $this->mrItemModel = new MrItemModel();
        $this->taskModel = new TaskModel();
    }

    /**
     * Helper method to prepare dashboard data for Head roles with assignment checking
     */
    private function prepareHeadDashboardData($currentUserId, $departmentId)
    {
        // Fetch subordinates
        $subordinates = $this->userRoleDepartmentModel->getUsersInSameDepartment($currentUserId, $departmentId);
        log_message('debug', '[DashboardController] Subordinates found: ' . json_encode($subordinates));

        // Check for active assignments and identify if any subordinate is already assigned
        $taskModel = new TaskModel();
        $assignedUserName = null;
        foreach ($subordinates as &$subordinate) {
            $hasAssignment = $taskModel->hasActivePpmpAssignment($subordinate['user_id']);
            log_message('debug', '[DashboardController] Checking assignment for user ID ' . $subordinate['user_id'] . '. Has assignment? ' . ($hasAssignment ? 'Yes' : 'No'));
            $subordinate['has_assignment'] = $hasAssignment;
            if ($hasAssignment) {
                // If an assignment is found, store the user's full name
                $assignedUserName = $subordinate['user_firstname'] . ' ' . $subordinate['user_lastname'];
                log_message('debug', '[DashboardController] Assigned user found: ' . $assignedUserName);
            }
        }

        // Prepare dashboard data
        $dashboardData = [
            'procurement_status' => null,
            'faculty_count' => $this->userModel->getFacultyCountByDepartment($departmentId),
            'staff_count' => $this->userModel->getStaffCountByDepartment($departmentId),
            'department_budget' => $this->departmentBudgetModel->getBudgetByDepartmentAndYear($departmentId, date('Y')),
            'subordinates' => $subordinates,
            'assigned_user_name' => $assignedUserName, // Pass the name of the assigned user to the view
            'is_assignment_pending' => !is_null($assignedUserName) // Pass a flag indicating an assignment is pending
        ];

        log_message('debug', '[DashboardController] Final dashboard data: ' . json_encode($dashboardData));

        return $dashboardData;
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
                // Use helper method to prepare dashboard data with assignment checking
                $dashboard_data = $this->prepareHeadDashboardData($currentUserId, $departmentId);
                
                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'dashboard_data' => $dashboard_data,
                    'user_department_id' => $departmentId // Pass department ID to the view
                ];
                 
                // Redirect user sa dashboard page niya with pass data with contains the necessary data to render to dashboard
                return view('user-pages/director/dir-dashboard', $data);
                break;

            case "Assistant Director":
                // Use helper method to prepare dashboard data with assignment checking
                $dashboard_data = $this->prepareHeadDashboardData($currentUserId, $departmentId);

                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,   
                    'dashboard_data' => $dashboard_data,
                    'user_department_id' => $departmentId // Pass department ID to the view
                ];
 
                // Redirect user sa dashboard page niya with pass data with contains the necessary data to render to dashboard
                return view('user-pages/assistant-director/ast-dir-dashboard', $data);
                break;
            case "Head":
                // Use helper method to prepare dashboard data with assignment checking
                $dashboard_data = $this->prepareHeadDashboardData($currentUserId, $departmentId);

                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'dashboard_data' => $dashboard_data,
                    'user_department_id' => $departmentId // Pass department ID to the view
                ];
                // Redirect using return view('[user-dashboard-page]', data)
                return view('user-pages/head/head-dashboard', $data);
                break;

            case "Planning Officer":
                // Use helper method to prepare dashboard data with assignment checking
                $dashboard_data = $this->prepareHeadDashboardData($currentUserId, $departmentId);

                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'dashboard_data' => $dashboard_data,
                    'user_department_id' => $departmentId // Pass department ID to the view
                ];
                // Redirect using return view('[user-dashboard-page]', data)
                return view('user-pages/planning/plan-dashboard', $data);
                break;

            case "Supply":
                // Use helper method to prepare dashboard data with assignment checking
                $dashboard_data = $this->prepareHeadDashboardData($currentUserId, $departmentId);

                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'dashboard_data' => $dashboard_data,
                    'user_department_id' => $departmentId // Pass department ID to the view
                ];
                // Redirect using return view('[user-dashboard-page]', data)
                return view('user-pages/supply/sup-dashboard', $data);

                break;

            case "Procurement":
                // Use helper method to prepare dashboard data with assignment checking
                $dashboard_data = $this->prepareHeadDashboardData($currentUserId, $departmentId);
                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'dashboard_data' => $dashboard_data,
                    'user_department_id' => $departmentId // Pass department ID to the view
                ];
                // Redirect using return view('[user-dashboard-page]', data)
                return view('user-pages/procurement/pro-dashboard', $data);
                break;

            case "Faculty": // = Section Head
                // Get tasks for the user
                $tasks = $this->taskModel->getTasksForUser($userData['user_id']);

                // Dynamically generate filter options from the tasks list
                $taskTypesInTable = array_unique(array_column($tasks, 'task_type'));

                $filterOptions = ['ALL' => 'ALL'];
                $taskTypeMap = [
                    'Project Procurement Management Plan' => 'PPMP',
                    'Annual Procurement Plan' => 'APP',
                    'Purchase Request' => 'PR',
                    'Purchase Order' => 'PO',
                    'Property Acknowledgement Receipt' => 'PAR',
                    'Inventory Custodian Slip' => 'ICS',
                    'Assignment' => 'Assignment'
                ];

                foreach ($taskTypesInTable as $taskType) {
                    if (isset($taskTypeMap[$taskType])) {
                        $label = $taskTypeMap[$taskType];
                        $filterOptions[$label] = $taskType;
                    }
                }

                // Sort the options alphabetically by label, keeping ALL first
                if (count($filterOptions) > 1) {
                    $allOption = $filterOptions['ALL'];
                    unset($filterOptions['ALL']);
                    ksort($filterOptions);
                    $filterOptions = ['ALL' => $allOption] + $filterOptions;
                }

                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'user_department_id' => $departmentId, // Pass department ID
                    'tasks' => $tasks,
                    'filter_options' => $filterOptions
                ];

                // Redirect using return view('[user-dashboard-page]', data)
                return view('user-pages/faculty/fac-dashboard', $data);
                break;

            case null: // = Unassigned users
                // Get tasks for the user
                $tasks = $this->taskModel->getTasksForUser($userData['user_id']);

                // Dynamically generate filter options from the tasks list
                $taskTypesInTable = array_unique(array_column($tasks, 'task_type'));

                $filterOptions = ['ALL' => 'ALL'];
                $taskTypeMap = [
                    'Project Procurement Management Plan' => 'PPMP',
                    'Annual Procurement Plan' => 'APP',
                    'Purchase Request' => 'PR',
                    'Purchase Order' => 'PO',
                    'Property Acknowledgement Receipt' => 'PAR',
                    'Inventory Custodian Slip' => 'ICS',
                    'Assignment' => 'Assignment'
                ];

                foreach ($taskTypesInTable as $taskType) {
                    if (isset($taskTypeMap[$taskType])) {
                        $label = $taskTypeMap[$taskType];
                        $filterOptions[$label] = $taskType;
                    }
                }

                // Sort the options alphabetically by label, keeping ALL first
                if (count($filterOptions) > 1) {
                    $allOption = $filterOptions['ALL'];
                    unset($filterOptions['ALL']);
                    ksort($filterOptions);
                    $filterOptions = ['ALL' => $allOption] + $filterOptions;
                }

                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'user_department_id' => $departmentId, // Pass department ID
                    'tasks' => $tasks,
                    'filter_options' => $filterOptions
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
