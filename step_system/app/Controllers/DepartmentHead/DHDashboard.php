<?php

namespace App\Controllers\DepartmentHead;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\UserRoleDepartmentModel;
use App\Models\DepartmentBudgetModel;

class DHDashboard extends BaseController {


    protected $userModel;
    protected $userRoleDepartmentModel;
    protected $departmentBudgetModel;

    public function __construct () 
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

        // Return page with user data
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
        return view('user-pages/head/head-mr', $data);
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

    // public function createPpmp()
    // {
    //     $ppmpModel = new PpmpModel();
    //     $ppmpItemModel = new PpmpItemModel();

    //     $ppmpData = [
    //         'office' => $this->request->getPost('office'),
    //         'department_id' => session()->get('department_id'), // Assuming department_id is in session
    //         'user_id' => session()->get('user_id'), // Assuming user_id is in session
    //         'period_covered' => $this->request->getPost('period_covered'),
    //         'year' => date('Y'), // Or get from form
    //         'status' => 'pending', // Initial status
    //         'prepared_by_position' => $this->request->getPost('position1'),
    //         'prepared_by_personnel' => $this->request->getPost('personnel1'),
    //         'recommended_by_position' => $this->request->getPost('position2'),
    //         'recommended_by_personnel' => $this->request->getPost('personnel2'),
    //         'evaluated_approved_by_position' => $this->request->getPost('position3'),
    //         'evaluated_approved_by_personnel' => $this->request->getPost('personnel3'),
    //         'total_budget_allocated' => $this->request->getPost('ttl_budget_allocated'),
    //         'total_proposed_budget' => $this->request->getPost('ttl_proposed_budget')
    //     ];

    //     $ppmpId = $ppmpModel->insert($ppmpData);

    //     if ($ppmpId) {
    //         $items = $this->request->getPost('items');
    //         if (!empty($items)) {
    //             foreach ($items as $item) {
    //                 $itemData = [
    //                     'ppmp_id' => $ppmpId,
    //                     'code' => $item['code'],
    //                     'general_description' => $item['gen_desc'],
    //                     'quantity_size' => $item['qty_size'],
    //                     'estimated_budget' => $item['est_budget'],
    //                     'jan' => isset($item['month']['jan']) ? 1 : 0,
    //                     'feb' => isset($item['month']['feb']) ? 1 : 0,
    //                     'mar' => isset($item['month']['mar']) ? 1 : 0,
    //                     'apr' => isset($item['month']['apr']) ? 1 : 0,
    //                     'may' => isset($item['month']['may']) ? 1 : 0,
    //                     'jun' => isset($item['month']['jun']) ? 1 : 0,
    //                     'jul' => isset($item['month']['jul']) ? 1 : 0,
    //                     'aug' => isset($item['month']['aug']) ? 1 : 0,
    //                     'sep' => isset($item['month']['sep']) ? 1 : 0,
    //                     'oct' => isset($item['month']['oct']) ? 1 : 0,
    //                     'nov' => isset($item['month']['nov']) ? 1 : 0,
    //                     'dec' => isset($item['month']['dec']) ? 1 : 0,
    //                 ];
    //                 $ppmpItemModel->insert($itemData);
    //             }
    //         }
    //          return redirect()->to('head/ppmp')->with('status', 'PPMP created successfully');
    //     } else {
    //         return redirect()->to('head/ppmp')->with('status', 'Failed to create PPMP');
    //     }
    // }
}
