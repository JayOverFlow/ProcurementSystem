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
    public function index($prId = null)
    {
        $userData = $this->loadUserSession();
        $departments = $this->departmentModel->getAllDepartments();
        $users = $this->userModel->getAllUsers();

        $data = [
            'user_data' => $userData,
            'departments' => $departments,
            'users' => $users,
            'pr' => null,
            'pr_items' => [],
        ];

        if ($prId) {
            $pr = $this->prModel->find($prId);
            if ($pr) {
                $prItems = $this->prItemModel->where('pr_id_fk', $prId)->findAll();
                $data['pr'] = $pr;
                $data['pr_items'] = $prItems;
            }
        }

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
        $prId = $this->request->getPost('pr_id');

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

            if (empty($prId)) {
                // Create new PR
                $this->prModel->insert($prData);
                $prId = $this->prModel->getInsertID();
                
                // 2. Insert into pr_items_tbl
                $this->taskModel->insert([
                    'submitted_by' => $userData['user_id'],
                    'submitted_to' => null,
                    'pr_id_fk' => $prId,
                    'task_type' => 'Purchase Request',
                    'task_description' => 'A new Purchase Request has been submitted for your review.'
                ]);

                $message = 'Your Purchase Request has been saved.';
            } else {
                // Update existing PR
                $this->prModel->update($prId, $prData);
                $this->prItemModel->where('pr_id_fk', $prId)->delete();

                $message = 'Your Purchase Request has been updated.';
            }

            // Insert PR items
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
                return redirect()->to('pr/create/' . $prId)->with('success', $message);
            }
        } catch (\Exception $e) {
            log_message('error', 'PR Save Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function submit() {
        $userData = $this->loadUserSession();
        $db = \Config\Database::connect(); // Database connection
        $prId = $this->request->getPost('pr'); // Get the pr_id from hidden input field

        // If the document already submitted
        $pr = $this->prModel->find($prId);
        if ($pr && $pr['pr_status'] !== 'Draft') {
            return redirect()->to('pr/create/' . $prId)->with('error', 'This Purchase Request has already been submitted.');
        }

        // NOTE: Saved PRs should be submitted to Head by user's department
        $head = $this->userModel->getHeadByDepId(userData['user_dep_id']); // Get Head of department / Office
        // If there's no Head
        if (empty($head)) {
            return redirect()->back()->with('error', 'Cannot submit: No Head found in the system.');
        }

        $db->transStart(); // Start db transaction

        try {
            $task = $this->getTaskByprId($prId); // Get task corresponds to prId
            // If task found
            if ($task) {
                // Update task to submit to director
                $this->taskModel->update($task['task_id'],[
                    'submitted_to' => $head,
                    'task_description' => 'A new Purchase Request has been submitted for your review.',
                ]);
            } else { // If task not found
                return redirect()->back()->with('error', 'Cannot find the original task to submit.');
            }

            $this->prModel->update($prId, ['pr_status' => 'Pending']); // Update the pr_status to Pending

            $db->transComplete(); // Complete the database transaction

            // If transaction failed
            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'Failed to submit Project Procurement Management Plan due to a database error.');
            }

            // Redirect back with succesful message
            return redirect()->to('pr/create' . $prId)->with('success', 'Purchase Request successfully submitted to Campus Director for review.');

        } catch (\Exception $e) {
            log_message('error', 'PR Submission Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred during submission.');
        }
    }
}
