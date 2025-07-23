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
    protected $ppmpModel;
    protected $PpmpItemModel;
    protected $taskModel;

    public function __construct() {
        $this->departmentModel = new DepartmentModel();
        $this->userModel = new UserModel();
        $this->ppmpModel = new PpmpModel();
        $this->ppmpItemModel = new PpmpItemModel();
        $this->taskModel = new TaskModel();
    }

    public function index($ppmpId = null)
    {
        $userData = $this->loadUserSession();
        $departments = $this->departmentModel->getAllDepartments();
        $users = $this->userModel->getAllUsers();

        $data = [
            'user_data' => $userData,
            'departments' => $departments,
            'users' => $users,
            'ppmp' => null, // Will hold the PPMP main data if editing an existing form
            'ppmp_items' => [] // Will hold the PPMP items data if editing an existing form
        ];

        // If a ppmpId is provided in the URL, fetch the existing PPMP data
        if ($ppmpId) {
            $ppmp = $this->ppmpModel->find($ppmpId);
            if ($ppmp) {
                // If PPMP found, fetch its associated items
                $ppmpItems = $this->ppmpItemModel->where('ppmp_id_fk', $ppmpId)->findAll();
                // Populate the data array with existing PPMP and its items
                $data['ppmp'] = $ppmp;
                $data['ppmp_items'] = $ppmpItems;
            }
        }

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

    public function save()
    {
        $userData = $this->loadUserSession();
        $db = \Config\Database::connect();

        $ppmpId = $this->request->getPost('ppmp_id'); // Get ppmp_id from hidden input

        $db->transStart();

        try {
            // 1. Insert into ppmp_tbl
            $ppmpData = [
                'ppmp_office_fk' => $this->request->getPost('ppmp_office_fk'),
                'saved_by_user_id_fk' => $userData['user_id'],
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
                'ppmp_remarks' => 'PPMP remark'
            ];

            if ($ppmpId) {
                // Update existing PPMP
                $this->ppmpModel->update($ppmpId, $ppmpData);

                // Delete existing items for this PPMP before inserting new ones
                $this->ppmpItemModel->where('ppmp_id_fk', $ppmpId)->delete();
            } else {
                // Insert new PPMP
                $this->ppmpModel->insert($ppmpData);
                $ppmpId = $this->ppmpModel->getInsertID();
            }

            // 2. Prepare and insert/update into ppmp_items_tbl
            $allItems = [];
            $mooeItems = $this->request->getPost('items') ?? [];
            $coItems = $this->request->getPost('items_co') ?? [];
            
            $items = array_merge($mooeItems, $coItems);

            foreach ($items as $item) {
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
                $this->ppmpItemModel->insertBatch($allItems);
            }
            
            // Create/Update task for Planning Officers
            $taskData = [
                'submitted_by' => $userData['user_id'],
                'submitted_to' => null,
                'ppmp_id_fk' => $ppmpId,
                'task_type' => 'Project Procurement Management',
                'task_description' => 'Project Procurement Management Plan has been ' . ($ppmpId ? 'updated' : 'submitted') . ' for your review.'
            ];

            // Check if a task for this PPMP already exists
            $existingTask = $this->taskModel->where('ppmp_id_fk', $ppmpId)->first();

            if ($existingTask) {
                $this->taskModel->update($existingTask['task_id'], $taskData);
            } else {
                $this->taskModel->insert($taskData);
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'An error occurred while saving the Project Procurement Management Plan.');
            } else {
                return redirect()->back()->with('success', 'Your Project Procurement Management Plan has been saved.');
            }

        } catch (\Exception $e) {
            log_message('error', 'PPMP Saving/Submission Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function preview($ppmpId)
    {
        $ppmpModel = new PpmpModel();
        $ppmpItemModel = new PpmpItemModel();
        $departmentModel = new DepartmentModel;
        $userModel = new UserModel();

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