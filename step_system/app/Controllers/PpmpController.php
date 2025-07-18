<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PpmpModel;
use App\Models\PpmpItemModel;
use App\Models\TaskModel;
use App\Models\UserModel;
use App\Models\DepartmentModel;

class PpmpController extends BaseController
{
    protected $departmentModel;
    protected $userModel;

    public function __construct() {
        $this->departmentModel = new DepartmentModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $userData = $this->loadUserSession();
        $departments = $this->departmentModel->getAllDepartments();
        $users = $this->userModel->getAllUsers();

        $data = [
            'user_data' => $userData,
            'departments' => $departments,
            'users' => $users
        ];

        $role = $userData['gen_role'] ?? null;

        switch ($role) {
            case 'Director':
                return view('user-pages/director/dir-ppmp', $data);
            case 'Planning Officer':
                return view('user-pages/planning/plan-ppmp', $data);
            case 'Head':
                return view('user-pages/head/head-ppmp', $data);
            case 'Faculty': // = Section Head
                return view('user-pages/faculty/fac-ppmp', $data);
            case 'Procurement':
                return view('user-pages/procurement/pro-ppmp', $data);
            case 'Supply':
                return view('user-pages/supply/sup-ppmp', $data);
            default:
                return view('user-pages/unassigned/unassigned-ppmp', $data);
        }
    }

    public function create()
    {
        $ppmpModel = new PpmpModel();
        $ppmpItemModel = new PpmpItemModel();
        $taskModel = new TaskModel();
        $userModel = new UserModel();
        $db = \Config\Database::connect();
        $userId = session()->get('user_id'); 

        $db->transStart();

        try {
            // 1. Insert into ppmp_tbl
            $ppmpData = [
                'ppmp_office_fk' => $this->request->getPost('ppmp_office_fk'),
                'ppmp_period_covered' => $this->request->getPost('ppmp_period_covered'),
                'ppmp_date_approved' => $this->request->getPost('ppmp_date_approved'),
                'ppmp_total_budget_allocated' => $this->request->getPost('ppmp_total_budget_allocated'),
                'ppmp_total_proposed_budget' => $this->request->getPost('ppmp_total_proposed_budget'),
                'ppmp_prepared_by_position' => $this->request->getPost('ppmp_prepared_by_position'),
                'ppmp_prepared_by_name' => $this->request->getPost('ppmp_prepared_by_name'),
                'ppmp_recommended_by_position' => $this->request->getPost('ppmp_recommended_by_position'),
                'ppmp_recommended_by_name' => $this->request->getPost('ppmp_recommended_by_name'),
                'ppmp_evaluated_by_position' => $this->request->getPost('ppmp_evaluated_by_position'),
                'ppmp_evaluated_by_name' => $this->request->getPost('ppmp_evaluated_by_name'),
                'ppmp_status' => 'Pending', // Default status
                'ppmp_remarks' => 'PPMP submitted'
            ];

            $ppmpModel->insert($ppmpData);
            $ppmpId = $ppmpModel->getInsertID();

            // 2. Prepare and insert into ppmp_items_tbl
            $allItems = [];
            $mooeItems = $this->request->getPost('items') ?? [];
            $coItems = $this->request->getPost('items_co') ?? [];
            
            $items = array_merge($mooeItems, $coItems);

            foreach ($items as $item) {
                if (empty($item['gen_desc']) && empty($item['code'])) {
                    continue;
                }
                
                $months = $item['month'] ?? [];

                $allItems[] = [
                    'ppmp_id_fk' => $ppmpId,
                    'ppmp_item_code' => $item['code'],
                    'ppmp_item_name' => $item['gen_desc'],
                    'ppmp_item_quantity' => $item['qty_size'],
                    'ppmp_item_estimated_budget' => $item['est_budget'],
                    'ppmp_sched_jan' => $months['jan'] ?? 0,
                    'ppmp_sched_feb' => $months['feb'] ?? 0,
                    'ppmp_sched_mar' => $months['mar'] ?? 0,
                    'ppmp_sched_apr' => $months['apr'] ?? 0,
                    'ppmp_sched_may' => $months['may'] ?? 0,
                    'ppmp_sched_jun' => $months['jun'] ?? 0,
                    'ppmp_sched_jul' => $months['jul'] ?? 0,
                    'ppmp_sched_aug' => $months['aug'] ?? 0,
                    'ppmp_sched_sep' => $months['sep'] ?? 0,
                    'ppmp_sched_oct' => $months['oct'] ?? 0,
                    'ppmp_sched_nov' => $months['nov'] ?? 0,
                    'ppmp_sched_dec' => $months['dec'] ?? 0,
                ];
            }

            if (!empty($allItems)) {
                $ppmpItemModel->insertBatch($allItems);
            }
            
            // 3. Create tasks for Planning Officers
            $planningOfficers = $userModel->getUsersByGenRole('Planning Officer');
            foreach ($planningOfficers as $officerId) {
                $taskModel->insert([
                    'submitted_by' => $userId,
                    'submitted_to' => $officerId,
                    'ppmp_id_fk' => $ppmpId,
                    'task_type' => 'PPMP',
                    'task_description' => 'A new PPMP has been submitted for your review.'
                ]);
            }


            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'An error occurred while saving & submitting the Project Procurement Management Plan.');
            } else {
                return redirect()->back()->with('success', 'Your Project Procurement Management Plan has been saved & submitted.');
            }

        } catch (\Exception $e) {
            log_message('error', 'PPMP Creation/Submission Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function preview($ppmpId)
    {
        $ppmpModel = new PpmpModel();
        $ppmpItemModel = new PpmpItemModel();
        $departmentModel = new DepartmentModel;
        $userModel = new UserModel();

        // $data['ppmp'] = $ppmpModel->find($ppmpId);
        // $data['ppmp_items'] = $ppmpItemModel->where('ppmp_id_fk', $ppmpId)->findAll();
        $ppmp = $ppmpModel->find($ppmpId);
        $ppmpItems = $ppmpItemModel->where('ppmp_id_fk', $ppmpId)->findAll();

        $data = [
            'ppmp' => $ppmp,
            'ppmp_items' => $ppmpItems,
            'office' => $departmentModel->getDepartmentNameById($ppmp['ppmp_office_fk']),
            'prepared_by' => $userModel->getUserFullNameById($ppmp['ppmp_prepared_by_name']),
            'recommended_by' => $userModel->getUserFullNameById($ppmp['ppmp_recommended_by_name']),
        ];

        
        if (empty($data['ppmp'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('PPMP not found');
        }
        
        return view('preview-pages/ppmp-preview', $data);
    }
} 