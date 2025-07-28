<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ParModel;
use App\Models\ParItemModel;
use App\Models\TaskModel;
use App\Models\UserModel;

class ParController extends BaseController
{
    protected $parModel;
    protected $parItemModel;
    protected $taskModel;
    protected $userModel;

    public function __construct()
    {
        $this->parModel = new ParModel();
        $this->parItemModel = new ParItemModel();
        $this->taskModel = new TaskModel();
        $this->userModel = new UserModel();
    }

    public function index($parId = null)
    {
        $userData = $this->loadUserSession();
        $users = $this->userModel->getAllUsers(); // Assuming this fetches all users for dropdowns

        $data = [
            'user_data' => $userData,
            'users' => $users,
            'par' => null,
            'par_items' => []
        ];

        if ($parId) {
            $par = $this->parModel->find($parId);
            if ($par) {
                $data['par'] = $par;
                $data['par_items'] = $this->parItemModel->where('par_id_fk', $parId)->findAll();
            }
        }

        // You might want to restrict access based on user role here, similar to AppController
        // if (($userData['gen_role'] ?? null) !== 'Supply') {
        //     return redirect()->back()->with('error', 'This page is restricted.');
        // }

        return view('user-pages/supply/sup-par', $data);
    }

    public function save()
    {
        $userData = $this->loadUserSession();
        $db = \Config\Database::connect();
        $parId = $this->request->getPost('par_id');

        // Validation rules (similar to APPController)
        $rules = [
            'par_fund_cluster' => 'required',
            'par_po_no' => 'required',
            'par_no' => 'required',
            'par_code_no' => 'required',
            'par_received_from_user_fk' => 'required|greater_than[0]',
            'par_received_from_date' => 'required',
            'par_issued_by_user_fk' => 'required|greater_than[0]',
            'par_issued_by_date' => 'required',
        ];

        $messages = [
            'par_fund_cluster' => ['required' => 'Fund Cluster is required.'],
            'par_po_no' => ['required' => 'P.O. No. is required.'],
            'par_no' => ['required' => 'PAR No. is required.'],
            'par_code_no' => ['required' => 'Code No. is required.'],
            'par_received_from_user_fk' => ['required' => 'Received From Personnel is required.', 'greater_than' => 'Received From Personnel is required.'],
            'par_received_from_date' => ['required' => 'Received From Date is required.'],
            'par_issued_by_user_fk' => ['required' => 'Issued By Personnel is required.', 'greater_than' => 'Issued By Personnel is required.'],
            'par_issued_by_date' => ['required' => 'Issued By Date is required.'],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db->transStart();

        try {
            // 1. Insert or Update par_tbl
            $parData = [
                'prop_ack_status' => 'Draft',
                'saved_by_user_id_fk' => $userData['user_id'],
                'par_fund_cluster' => $this->request->getPost('par_fund_cluster'),
                'par_po_no' => $this->request->getPost('par_po_no'),
                'par_no' => $this->request->getPost('par_no'),
                'par_code_no' => $this->request->getPost('par_code_no'),
                'par_received_from_user_fk' => $this->request->getPost('par_received_from_user_fk'),
                'par_received_from_date' => $this->request->getPost('par_received_from_date'),
                'par_issued_by_user_fk' => $this->request->getPost('par_issued_by_user_fk'),
                'par_issued_by_date' => $this->request->getPost('par_issued_by_date'),
                // 'prop_ack_po_item_id_fk' => $this->request->getPost('prop_ack_po_item_id_fk'), // Not in form yet
            ];

            if ($parId) {
                $this->parModel->update($parId, $parData);
            } else {
                $this->parModel->insert($parData);
                $parId = $this->parModel->getInsertID();
            }

            // Clear existing items before inserting new ones
            if ($parId) {
                $this->parItemModel->where('par_id_fk', $parId)->delete();
            }

            // 2. Prepare and insert into par_items_tbl
            $items = $this->request->getPost('items') ?? [];
            $itemData = [];
            foreach ($items as $item) {
                // Skip rows where all values are empty or null
                $isRowEmpty = true;
                foreach ($item as $value) {
                    if ($value !== '' && $value !== null) {
                        $isRowEmpty = false;
                        break;
                    }
                }
                if ($isRowEmpty) {
                    continue;
                }
                
                $itemData[] = [
                    'par_id_fk' => $parId,
                    'par_qty' => $item['par_qty'],
                    'par_unit' => $item['par_unit'],
                    'par_descrip' => $item['par_descrip'],
                    'par_prop_no' => $item['par_prop_no'],
                    'par_date_acquired' => $item['par_date_acquired'],
                    'par_amount' => $item['par_amount'],
                ];
            }
            if (!empty($itemData)) {
                $this->parItemModel->insertBatch($itemData);
            }

            // Create/Update task for this PAR
            $taskData = [
                'submitted_by' => $userData['user_id'],
                'submitted_to' => null, // Will be set on submission
                'par_id_fk' => $parId,
                'task_type' => 'Property Acknowledgement Receipt',
                'task_description' => 'A Property Acknowledgement Receipt has been saved and is ready for submission.'
            ];

            // $existingTask = $this->taskModel->where('par_id_fk', $parId)->first(); // Need to add getTaskByParId to TaskModel
            $existingTask = $this->taskModel->getTaskByParId($parId); // Need to add getTaskByParId to TaskModel

            if ($existingTask) {
                $this->taskModel->update($existingTask['task_id'], $taskData);
            } else {
                $this->taskModel->insert($taskData);
            }
            
            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'An error occurred while saving the Property Acknowledgement Receipt.');
            }
            return redirect()->to('par/create/' . $parId)->with('success', 'Property Acknowledgement Receipt has been saved.');

        } catch (\Exception $e) {
            log_message('error', 'PAR Save Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function submit() {
        $userData = $this->loadUserSession();
        $db = \Config\Database::connect(); // Database connection
        $parId = $this->request->getPost('par_id'); // Get the par_id from hidden input field

        // If the document already submitted
        $par = $this->parModel->find($parId);
        if ($par && $par['prop_ack_status'] !== 'Draft') {
            return redirect()->to('par/create/' . $parId)->with('error', 'This Property Acknowledgement Receipt has already been submitted.');
        }

        $db->transStart(); // Start db transaction

        try {
            $task = $this->taskModel->getTaskByParId($parId); // Get task corresponds to parId
            // If task found
            if ($task) {
                // Update task to submit to director
                $this->taskModel->update($task['task_id'],[
                    'submitted_to' => $this->request->getPost('par_received_from_user_fk'),
                    'task_description' => 'A new Property Acknowledgement Receipt has been submitted for your review.',
                ]);
            } else { // If task not found
                return redirect()->back()->with('error', 'Cannot find the original task to submit.');
            }

            $this->parModel->update($parId, ['prop_ack_status' => 'Pending']); // Update the prop_ack_status to Pending

            $db->transComplete(); // Complete the database transaction

            // If transaction failed
            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'Failed to submit Property Acknowledgement Receipt due to a database error.');
            }

            // Redirect back with successful message
            return redirect()->to('par/create/' . $parId)->with('success', 'Property Acknowledgement Receipt successfully submitted for review.');

        } catch (\Exception $e) {
            log_message('error', 'PAR Submission Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred during submission.');
        }
    }
}
