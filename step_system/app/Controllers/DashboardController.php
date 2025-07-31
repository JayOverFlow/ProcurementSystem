<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\UserRoleDepartmentModel;
use App\Models\TaskModel;
use App\Models\DepartmentBudgetModel;
use App\Models\MrItemModel;
use App\Models\PpmpModel;
use App\Models\AppModel;

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
        $this->ppmpModel = new PpmpModel();
        $this->appModel = new AppModel();
    }

    /**
     * Helper method to prepare dashboard data for Head roles with assignment checking
     */
        private function prepareHeadDashboardData($currentUserId, $departmentId)
    {
        // Determine the current procurement stage for the entire department
        $departmentHasApprovedPpmp = $this->ppmpModel->hasApprovedPpmpForDepartment($departmentId);
        $departmentHasApprovedApp = $departmentHasApprovedPpmp ? $this->appModel->hasApprovedAppForDepartment($departmentId) : false;

        $nextTaskForDepartment = ($departmentHasApprovedPpmp && $departmentHasApprovedApp) ? 'pr' : 'ppmp';

        // Fetch subordinates with their assignment status based on the next task
        if ($nextTaskForDepartment === 'pr') {
            $subordinates = $this->userRoleDepartmentModel->getSubordinatesWithPrStatus($currentUserId, $departmentId);
        } else {
            $subordinates = $this->userRoleDepartmentModel->getSubordinatesWithPpmpStatus($currentUserId, $departmentId);
        }



        // For each subordinate, set their task and check for active assignments
        $activePrAssignee = null;
        $isPpmpAssignmentPending = false;
        if ($nextTaskForDepartment === 'pr') {
            $activePrAssignee = $this->taskModel->getActivePrAssigneeForDepartment($departmentId);
        } else {
            $isPpmpAssignmentPending = $this->taskModel->hasActivePpmpAssignmentForDepartment($departmentId);
        }

        $isAssignmentPending = !is_null($activePrAssignee) || $isPpmpAssignmentPending;

        foreach ($subordinates as &$subordinate) {
            $subordinate['next_task'] = $nextTaskForDepartment;
        }

        // Prepare dashboard data
        $dashboardData = [
            'procurement_status' => null,
            'faculty_count' => $this->userModel->getFacultyCountByDepartment($departmentId),
            'staff_count' => $this->userModel->getStaffCountByDepartment($departmentId),
            'department_budget' => $this->departmentBudgetModel->getBudgetByDepartmentAndYear($departmentId, date('Y')),
            'subordinates' => $subordinates,
            'assigned_user_name' => $activePrAssignee ? $activePrAssignee['user_fullname'] : null, // This might need adjustment if we need PPMP assignee name
            'is_assignment_pending' => $isAssignmentPending,
            'isPpmpPhaseComplete' => $departmentHasApprovedPpmp,
            'isAppPhaseComplete' => $departmentHasApprovedApp
        ];

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

                // Determine the next task type based on pending assignments
                $nextTaskType = 'ppmp'; // Default to PPMP
                foreach ($tasks as $task) {
                    if (isset($task['task_status']) && $task['task_status'] === 'Pending') {
                        if ($task['task_type'] === 'PR Assignment') {
                            $nextTaskType = 'pr';
                            break; // A PR assignment is the next logical step
                        } elseif ($task['task_type'] === 'PPMP Assignment') {
                            $nextTaskType = 'ppmp';
                            break; // A PPMP assignment is pending
                        }
                    }
                }

                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'user_department_id' => $departmentId, // Pass department ID
                    'tasks' => $tasks,
                    'filter_options' => $filterOptions,
                    'next_task_type' => $nextTaskType
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

                // Determine the next task type based on pending assignments
                $nextTaskType = 'ppmp'; // Default to PPMP
                foreach ($tasks as $task) {
                    if (isset($task['task_status']) && $task['task_status'] === 'Pending') {
                        if ($task['task_type'] === 'PR Assignment') {
                            $nextTaskType = 'pr';
                            break; // A PR assignment is the next logical step
                        } elseif ($task['task_type'] === 'PPMP Assignment') {
                            $nextTaskType = 'ppmp';
                            break; // A PPMP assignment is pending
                        }
                    }
                }

                // Store user data and dashbaord data
                $data = [
                    'user_data' => $userData,
                    'user_department_id' => $departmentId, // Pass department ID
                    'tasks' => $tasks,
                    'filter_options' => $filterOptions,
                    'next_task_type' => $nextTaskType
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
