<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DepartmentModel;
use App\Models\UserModel;
use App\Models\PrModel;
use App\Models\PrItemModel;
use App\Models\TaskModel;

class PrController extends BaseController
{
    protected $departmentModel;
    protected $userModel;
    protected $prModel;
    protected $prItemModel;
    protected $taskModel;

    public function __construct() {
        $this->departmentModel = new DepartmentModel();
        $this->userModel = new UserModel();
        $this->prModel = new PrModel();
        $this->prItemModel = new PrItemModel();
        $this->taskModel = new TaskModel();
    }
    public function index()
    {
        $userData = $this->loadUserSession();
        $departments = $this->departmentModel->getAllDepartments();
        $users = $this->userModel->getAllUsers();

        $data = [
            'user_data' => $userData,
            'departments' => $departments,
            'users' => $users,
        ];

        $role = $userData['gen_role'] ?? null;

        switch ($role) {
            case 'Director':
                return view('user-pages/director/dir-pr', $data);
            case 'Planning Officer':
                return view('user-pages/planning/plan-pr', $data);
            case 'Head':
                return view('user-pages/head/head-pr', $data);
            case 'Faculty': // = Section Head
                return view('user-pages/faculty/fac-pr', $data);
            case 'Procurement':
                return view('user-pages/procurement/pro-pr', $data);
            case 'Supply':
                return view('user-pages/supply/sup-pr', $data);
            default:
                return view('user-pages/unassigned/unassigned-pr', $data);
        }
    }

    public function save()
    {
        $userData = $this->loadUserSession();
        $db = \Config\Database::connect();

        $db->transStart();

        try {
            // 1. Insert into pr_tbl
            $prData = [
                'pr_section' => $this->request->getPost('pr_section'),
                'pr_status' => 'Draft',
                'pr_department' => $this->request->getPost('pr_department'),
                'pr_no_date' => $this->request->getPost('pr_no_date'),
                'pr_sai_no_date' => $this->request->getPost('pr_sai_no_date'),
                'pr_requested_by_name' => $this->request->getPost('pr_requested_by_name'),
                'pr_requested_by_designation' => $this->request->getPost('pr_requested_by_designation'),
                'pr_approved_by_name' => $this->request->getPost('pr_approved_by_name'),
                'pr_approved_by_designation' => $this->request->getPost('pr_approved_by_designation'),
                'saved_by_user_id_fk' => $userData['user_id']
            ];
            $this->prModel->insert($prData);
            $prId = $this->prModel->getInsertID();

            // 2. Insert into pr_app_tbl
            $items = $this->request->getPost('items') ?? [];
            $itemData = [];
            foreach ($items as $item) {
                $itemData[] = [
                    'pr_id_fk' => $prId,
                    'pr_items_quantity' => $item['pr_items_quantity'],
                    'pr_items_cost' => $item['pr_items_cost'],
                    'pr_items_total_cost' => $item['pr_items_total_cost'],
                    'pr_items_unit' => $item['pr_items_unit'],
                    'pr_items_descrip' => $item['pr_items_descrip'],
                ];
            }
            if (!empty($itemData)) {
                $this->prItemModel->insertBatch($itemData);
            }

            $this->taskModel->insert([
                'submitted_by' => $userData['user_id'],
                'submitted_to' => null,
                'pr_id_fk' => $prId,
                'task_type' => 'Purchase Request',
                'task_description' => 'A new Purchase Request has been submitted for your review.'
            ]);

            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'An error occurred while saving the Purchase Request.');
            } else {
                return redirect()->back()->with('success', 'Your Purchase Request has been saved.');
            }


        } catch (\Exception $e) {
            log_message('error', 'Pr Creation/Submission Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
}
