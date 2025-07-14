<?php

namespace App\Controllers\DepartmentHead;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DHDashboard extends BaseController {

    public function index()
    {
        // We should return page with user data from database
        return view('user-pages/head/head-dashboard');
    }


    public function tasks()
    {
        return view('user-pages/head/head-tasks');
    }

    public function mr()
    {
        return view('user-pages/head/head-mr') ;
    }

    public function ppmp()
    {
        return view('user-pages/head/head-ppmp');
    }

    public function pr()
    {
        return view('user-pages/head/head-pr');
    }
    public function app()
    {
        return view('user-pages/head/head-app');
    }

    public function createPpmp()
    {
        $ppmpModel = new PpmpModel();
        $ppmpItemModel = new PpmpItemModel();

        $ppmpData = [
            'office' => $this->request->getPost('office'),
            'department_id' => session()->get('department_id'), // Assuming department_id is in session
            'user_id' => session()->get('user_id'), // Assuming user_id is in session
            'period_covered' => $this->request->getPost('period_covered'),
            'year' => date('Y'), // Or get from form
            'status' => 'pending', // Initial status
            'prepared_by_position' => $this->request->getPost('position1'),
            'prepared_by_personnel' => $this->request->getPost('personnel1'),
            'recommended_by_position' => $this->request->getPost('position2'),
            'recommended_by_personnel' => $this->request->getPost('personnel2'),
            'evaluated_approved_by_position' => $this->request->getPost('position3'),
            'evaluated_approved_by_personnel' => $this->request->getPost('personnel3'),
            'total_budget_allocated' => $this->request->getPost('ttl_budget_allocated'),
            'total_proposed_budget' => $this->request->getPost('ttl_proposed_budget')
        ];

        $ppmpId = $ppmpModel->insert($ppmpData);

        if ($ppmpId) {
            $items = $this->request->getPost('items');
            if (!empty($items)) {
                foreach ($items as $item) {
                    $itemData = [
                        'ppmp_id' => $ppmpId,
                        'code' => $item['code'],
                        'general_description' => $item['gen_desc'],
                        'quantity_size' => $item['qty_size'],
                        'estimated_budget' => $item['est_budget'],
                        'jan' => isset($item['month']['jan']) ? 1 : 0,
                        'feb' => isset($item['month']['feb']) ? 1 : 0,
                        'mar' => isset($item['month']['mar']) ? 1 : 0,
                        'apr' => isset($item['month']['apr']) ? 1 : 0,
                        'may' => isset($item['month']['may']) ? 1 : 0,
                        'jun' => isset($item['month']['jun']) ? 1 : 0,
                        'jul' => isset($item['month']['jul']) ? 1 : 0,
                        'aug' => isset($item['month']['aug']) ? 1 : 0,
                        'sep' => isset($item['month']['sep']) ? 1 : 0,
                        'oct' => isset($item['month']['oct']) ? 1 : 0,
                        'nov' => isset($item['month']['nov']) ? 1 : 0,
                        'dec' => isset($item['month']['dec']) ? 1 : 0,
                    ];
                    $ppmpItemModel->insert($itemData);
                }
            }
             return redirect()->to('head/ppmp')->with('status', 'PPMP created successfully');
        } else {
            return redirect()->to('head/ppmp')->with('status', 'Failed to create PPMP');
        }
    }
}
