<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\IcsModel;
use App\Models\IcsItemModel;
use App\Models\TaskModel;
use App\Models\UserModel;

class IcsController extends BaseController
{
    protected $icsModel;
    protected $icsItemModel;
    protected $taskModel;
    protected $userModel;

    public function __construct()
    {
        $this->icsModel = new IcsModel();
        $this->icsItemModel = new IcsItemModel();
        $this->taskModel = new TaskModel();
        $this->userModel = new UserModel();
    }

    public function index($icsId = null)
    {
        $userData = $this->loadUserSession();
        $users = $this->userModel->getAllUsers();

        $data = [
            'user_data' => $userData,
            'users' => $users,
            'ics' => null,
            'ics_items' => []
        ];

        if ($icsId) {
            $ics = $this->icsModel->getIcsWithItems($icsId);
            if ($ics) {
                $data['ics'] = $ics;
                $data['ics_items'] = $this->icsItemModel->where('ics_id_fk', $icsId)->findAll();
            }
        }

        return view('user-pages/supply/sup-ics', $data);
    }

    public function save()
    {
        $userData = $this->loadUserSession();
        $db = \Config\Database::connect();
        $icsId = $this->request->getPost('invent_custo_id');

        $rules = [
            'ics_fund_cluster' => 'required',
            'ics_po_no' => 'required|regex_match[/^\d{3}-\d{2}-\d{2}$/]',
            'ics_par_no' => 'required',
            'ics_code_no' => 'required',
            'ics_received_from_user_fk' => 'required|greater_than[0]',
            'ics_received_from_date' => 'required',
            'ics_received_by_user_fk' => 'required|greater_than[0]',
            'ics_received_by_date_fk' => 'required',
        ];

        $messages = [
            'ics_fund_cluster' => ['required' => 'Fund Cluster is required.'],
            'ics_po_no' => [
                'required' => 'P.O. No. is required.',
                'regex_match' => 'P.O. Number must be in format XXX-XX-XX.'
            ],
            'ics_par_no' => ['required' => 'PAR No. is required.'],
            'ics_code_no' => ['required' => 'Code No. is required.'],
            'ics_received_from_user_fk' => ['required' => 'Received From Personnel is required.', 'greater_than' => 'Received From Personnel is required.'],
            'ics_received_from_date' => ['required' => 'Received From Date is required.'],
            'ics_received_by_user_fk' => ['required' => 'Received By Personnel is required.', 'greater_than' => 'Received By Personnel is required.'],
            'ics_received_by_date_fk' => ['required' => 'Received By Date is required.'],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db->transStart();

        try {
            $icsData = [
                'invent_custo_status' => 'Draft',
                'saved_by_user_id_fk' => $userData['user_id'],
                'ics_fund_cluster' => $this->request->getPost('ics_fund_cluster'),
                'ics_po_no' => $this->request->getPost('ics_po_no'),
                'ics_par_no' => $this->request->getPost('ics_par_no'),
                'ics_code_no' => $this->request->getPost('ics_code_no'),
                'ics_received_from_user_fk' => $this->request->getPost('ics_received_from_user_fk'),
                'ics_received_from_date' => $this->request->getPost('ics_received_from_date'),
                'ics_received_by_user_fk' => $this->request->getPost('ics_received_by_user_fk'),
                'ics_received_by_date_fk' => $this->request->getPost('ics_received_by_date_fk'),
            ];

            if ($icsId) {
                $this->icsModel->update($icsId, $icsData);
            } else {
                $this->icsModel->insert($icsData);
                $icsId = $this->icsModel->getInsertID();
            }

            if ($icsId) {
                // Delete existing items before inserting new ones to prevent duplicates
                $this->icsItemModel->where('ics_id_fk', $icsId)->delete();
            }

            $items = $this->request->getPost('items') ?? [];
            $itemData = [];
            foreach ($items as $item) {
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
                    'ics_id_fk' => $icsId,
                    'ics_qty' => $item['ics_qty'],
                    'ics_unit' => $item['ics_unit'],
                    'ics_unit_cost' => $item['ics_unit_cost'],
                    'ics_total_cost' => $item['ics_total_cost'],
                    'ics_descrip' => $item['ics_descrip'],
                    'ics_invent_item_no' => $item['ics_invent_item_no'],
                    'ics_est_use_life' => $item['ics_est_use_life'],
                ];
            }

            if (!empty($itemData)) {
                $this->icsItemModel->insertBatch($itemData);
            }

            $taskData = [
                'submitted_by' => $userData['user_id'],
                'submitted_to' => null,
                'ics_id_fk' => $icsId,
                'task_type' => 'Inventory Custodian Slip',
                'task_description' => 'An Inventory Custodian Slip has been saved and is ready for submission.'
            ];

            $existingTask = $this->taskModel->getTaskByIcsId($icsId);

            if ($existingTask) {
                $this->taskModel->update($existingTask['task_id'], $taskData);
            } else {
                $this->taskModel->insert($taskData);
            }
            
            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'An error occurred while saving the Inventory Custodian Slip.');
            }
            return redirect()->to('ics/create/' . $icsId)->with('success', 'Inventory Custodian Slip has been saved.');

        } catch (\Exception $e) {
            log_message('error', 'ICS Save Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function submit() {
        $userData = $this->loadUserSession();
        $db = \Config\Database::connect();
        $icsId = $this->request->getPost('invent_custo_id');

        $ics = $this->icsModel->find($icsId);
        if ($ics && $ics['invent_custo_status'] !== 'Draft') {
            return redirect()->to('ics/create/' . $icsId)->with('error', 'This Inventory Custodian Slip has already been submitted.');
        }

        $db->transStart();

        try {
            $task = $this->taskModel->getTaskByIcsId($icsId);

            if ($task) {
                $this->taskModel->update($task['task_id'],[
                    'submitted_to' => $this->request->getPost('ics_received_by_user_fk'),
                    'task_description' => 'A new Inventory Custodian Slip has been submitted for your review.',
                ]);
            } else {
                return redirect()->back()->with('error', 'Cannot find the original task to submit.');
            }

            $this->icsModel->update($icsId, ['invent_custo_status' => 'Pending']);

            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'Failed to submit Inventory Custodian Slip due to a database error.');
            }

            return redirect()->to('ics/create/' . $icsId)->with('success', 'Inventory Custodian Slip successfully submitted for review.');

        } catch (\Exception $e) {
            log_message('error', 'ICS Submission Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred during submission.');
        }
    }
}
