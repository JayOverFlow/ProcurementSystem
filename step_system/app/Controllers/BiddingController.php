<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PrModel;
use App\Models\PrItemModel;
use App\Models\UserModel;
use App\Models\TaskModel;
use App\Models\DepartmentModel; // Added DepartmentModel

class BiddingController extends BaseController
{
    protected $prModel;
    protected $prItemModel;
    protected $userModel;
    protected $taskModel;
    protected $departmentModel; // Declared DepartmentModel

    public function __construct()
    {
        $this->prModel = new PrModel();
        $this->prItemModel = new PrItemModel();
        $this->userModel = new UserModel();
        $this->taskModel = new TaskModel();
        $this->departmentModel = new DepartmentModel(); // Initialized DepartmentModel
    }

    public function listPrsForBidding()
    {
        $userData = $this->loadUserSession();

        // Fetch approved PRs for bidding with requested_by_name, department_name, and pr_total
        $prs = $this->prModel
            ->select('pr_tbl.*, users_tbl.user_fullname as requested_by_name, departments_tbl.dep_name as department_name, SUM(pr_items_tbl.pr_items_total_cost) as pr_total')
            ->join('users_tbl', 'users_tbl.user_id = pr_tbl.pr_requested_by_name', 'left')
            ->join('departments_tbl', 'departments_tbl.dep_id = pr_tbl.pr_department', 'left')
            ->join('pr_items_tbl', 'pr_items_tbl.pr_id_fk = pr_tbl.pr_id', 'left')
            ->whereIn('pr_status', ['Approved', 'Bidding In Progress', 'Bidding Completed'])
            ->groupBy('pr_tbl.pr_id')
            ->findAll();

        // Fetch all departments for the filter dropdown
        $departments = $this->departmentModel->getAllDepartments();

        $data = [
            'user_data' => $userData,
            'prs' => $prs,
            'departments' => $departments,
        ];

        return view('user-pages/supply/pr_bidding_list', $data);
    }

    public function displayBiddingStatusForm(int $prId)
    {
        $userData = $this->loadUserSession();

        $pr = $this->prModel->find($prId);
        if (empty($pr)) {
            return redirect()->back()->with('error', 'Purchase Request not found.');
        }

        $prItems = $this->prItemModel->where('pr_id_fk', $prId)->findAll();

        // Fetch requested by user's full name and department name
        $requested_by_name = $this->userModel->getUserFullNameById($pr['pr_requested_by_name']);
        $department_name = $this->departmentModel->getDepartmentNameById($pr['pr_department']);

        // Determine if the form should be read-only
        $isReadOnlyForm = in_array($pr['pr_status'], ['Bidding Completed', 'Ready for PO Creation']);

        // Determine if all items are successful for enabling the submit button
        $all_items_successful = true;
        foreach ($prItems as $item) {
            if (($item['bidding_status'] ?? 'pending') !== 'successful') {
                $all_items_successful = false;
                break;
            }
        }

        $data = [
            'user_data' => $userData,
            'pr' => $pr,
            'pr_items' => $prItems,
            'requested_by_name' => $requested_by_name,
            'department_name' => $department_name,
            'isReadOnlyForm' => $isReadOnlyForm,
            'all_items_successful' => $all_items_successful,
        ];

        return view('user-pages/supply/bidding_status_form', $data);
    }

    public function saveBiddingStatus()
    {
        $userData = $this->loadUserSession();
        $db = \Config\Database::connect();
        $prId = $this->request->getPost('pr_id');
        $items = $this->request->getPost('items') ?? [];

        // Basic validation: Ensure PR exists and user is authorized (though filter should handle auth)
        $pr = $this->prModel->find($prId);
        if (empty($pr)) {
            return redirect()->back()->with('error', 'Purchase Request not found.');
        }

        // Further validation: Ensure status is not already completed
        if (in_array($pr['pr_status'], ['Bidding Completed', 'Ready for PO Creation'])) {
            return redirect()->to('supply/pr/bidding-status-form/' . $prId)->with('error', 'This document\'s bidding process is completed and cannot be modified.');
        }

        // Validate item bidding statuses
        $validationRules = [];
        $messages = [];
        foreach ($items as $itemId => $itemData) {
            $validationRules['items.' . $itemId . '.bidding_status'] = 'required|in_list[pending,successful,unsuccessful]';
            $messages['items.' . $itemId . '.bidding_status'] = 'Invalid bidding status for item ' . $itemId . '.';
        }

        if (!$this->validate($validationRules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db->transStart();

        try {
            // Update bidding status for each item
            foreach ($items as $itemId => $itemData) {
                $this->prItemModel->update($itemId, ['bidding_status' => $itemData['bidding_status']]);
            }

            // Update PR status to 'Bidding In Progress' if it was 'Approved'
            if ($pr['pr_status'] === 'Approved') {
                $this->prModel->update($prId, ['pr_status' => 'Bidding In Progress']);
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'An error occurred while saving bidding statuses.');
            }

            return redirect()->to('supply/pr/bidding-status-form/' . $prId)->with('success', 'Bidding statuses saved successfully.');

        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', 'Bidding Status Save Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    public function submitBiddingToProcurementHead()
    {
        $userData = $this->loadUserSession();
        $db = \Config\Database::connect();
        $input = $this->request->getJSON(true); // Get JSON data
        $prId = $input['pr_id'] ?? null;

        // Validate PR ID
        if (empty($prId)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Purchase Request ID is missing.']);
        }

        $pr = $this->prModel->find($prId);
        if (empty($pr)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Purchase Request not found.']);
        }

        // Check if bidding process is already completed
        if (in_array($pr['pr_status'], ['Bidding Completed', 'Ready for PO Creation'])) {
            return $this->response->setJSON(['success' => false, 'message' => 'This Purchase Request bidding process is already completed.']);
        }

        $db->transStart();

        try {
            // Critical Validation: Server-side verify that all items are 'successful'
            if (!$this->prItemModel->areAllItemsSuccessful($prId)) {
                throw new \Exception('Not all items have successful bidding status. Cannot submit.');
            }

            // Update PR status to 'Bidding Completed'
            $this->prModel->update($prId, ['pr_status' => 'Bidding Completed']);

            // Find current task for this PR, assigned to the Supply Officer
            $task = $this->taskModel->getTaskByPrId($prId); 

            if ($task) {
                // The task will remain visible in the task list, its status will be reflected by the PR status.
                // No need to set is_deleted to 1 here.
            } else {
                // If no task found, it might be an issue or an edge case. Log it.
                log_message('warning', 'No active task found for PR ID: ' . $prId . ' during bidding submission.');
            }

            // Get the user ID of the "Head of Procurement" (or specific Procurement Officer)
            // Assuming a role name 'Procurement Officer' or 'Head of Procurement Office'
            $procurementHeadUsers = $this->userModel->getUsersByRoleName('Head - Procurement'); // Adjust role name as per your DB
            
            if (empty($procurementHeadUsers)) {
                throw new \Exception('No Procurement Officer found in the system to assign the task.');
            }
            $procurementHeadId = $procurementHeadUsers[0]; // Assuming one Procurement Head for now

            // Create a new task for the Procurement Head to create PO
            $this->taskModel->insert([
                'submitted_by' => $userData['user_id'], // Supply Officer
                'submitted_to' => $procurementHeadId,
                'pr_id_fk' => $prId,
                'task_type' => 'Purchase Order',
                'task_description' => 'Create Purchase Order based on PR #' . $prId . ' - Bidding Successful.',
                'is_deleted' => 0 // Ensure new task is active
            ]);

            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Database transaction failed during submission.');
            }

            return $this->response->setJSON(['success' => true, 'message' => 'Purchase Request successfully submitted to Procurement Head for PO creation.']);

        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', 'Bidding Status Submit Error: ' . $e->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}