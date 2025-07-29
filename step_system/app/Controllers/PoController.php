<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PoModel;
use App\Models\PoItemModel;
use App\Models\PoItemSpecModel;
use App\Models\TaskModel;
use App\Models\UserModel;
use App\Models\DepartmentModel;
use App\Models\PrModel;

class PoController extends BaseController
{
    protected $poModel;
    protected $poItemModel;
    protected $poItemSpecModel;
    protected $taskModel;
    protected $userModel;

    public function __construct()
    {
        $this->poModel = new PoModel();
        $this->poItemModel = new PoItemModel();
        $this->poItemSpecModel = new PoItemSpecModel();
        $this->taskModel = new TaskModel();
        $this->userModel = new UserModel();
    }

    public function index($poId = null)
    {
        $userData = $this->loadUserSession();

        $data = [
            'user_data' => $userData,
            'po' => null,
            'po_items' => []
        ];

        if ($poId) {
            $po = $this->poModel->find($poId);
            if ($po) {
                $data['po'] = $po;
                $data['po_items'] = $this->poItemModel->where('po_items_id_fk', $poId)->findAll();
                foreach($data['po_items'] as &$item) {
                    $item['specifications'] = $this->poItemSpecModel->where('po_item_specs_id_fk', $item['po_items_id'])->findAll();
                }
            }
        }

        return view('user-pages/procurement/pro-po', $data);
    }

    public function save()
    {
        $rules = [
            'po_supplier' => 'required',
            'po_address' => 'required',
            'po_tele' => 'required|numeric',
            'po_tin' => 'required',
            'po_ponumber' => 'required',
            'po_date' => 'required',
            'po_mode' => 'required',
            'po_tuptin' => 'required',
            'po_place_delivery' => 'required',
            'po_date_delivery' => 'required',
            'po_delivery_term' => 'required',
            'po_payment_term' => 'required',
            'po_description' => 'required',
            'po_amount_in_words' => 'required',
            'po_total_amount' => 'required|numeric',
            'conforme_name_of_supplier' => 'required',
            'conforme_date' => 'required',
            'conforme_campus_director' => 'required',
            'po_fund_cluster' => 'required',
            'po_fund_available' => 'required',
            'po_accountant' => 'required',
            'po_orsburs' => 'required',
            'po_date_orsburs' => 'required',
            'po_amount' => 'required|numeric',
        ];

        $messages = [
            'po_supplier' => ['required' => 'Supplier is required.'],
            'po_address' => ['required' => 'Address is required.'],
            'po_tele' => ['required' => 'Telephone number is required.', 'numeric' => 'Telephone number must be numeric.'],
            'po_tin' => ['required' => 'TIN is required.'],
            'po_ponumber' => ['required' => 'P.O. Number is required.'],
            'po_date' => ['required' => 'Date is required.'],
            'po_mode' => ['required' => 'Mode of Procurement is required.'],
            'po_tuptin' => ['required' => 'TUP-Taguig TIN is required.'],
            'po_place_delivery' => ['required' => 'Place of Delivery is required.'],
            'po_date_delivery' => ['required' => 'Date of Delivery is required.'],
            'po_delivery_term' => ['required' => 'Delivery Term is required.'],
            'po_payment_term' => ['required' => 'Payment Term is required.'],
            'po_description' => ['required' => 'Description is required.'],
            'po_amount_in_words' => ['required' => 'Amount in Words is required.'],
            'po_total_amount' => ['required' => 'Total Amount is required.', 'numeric' => 'Total Amount must be numeric.'],
            'conforme_name_of_supplier' => ['required' => 'Name of Supplier is required.'],
            'conforme_date' => ['required' => 'Date is required.'],
            'conforme_campus_director' => ['required' => 'Campus Director is required.'],
            'po_fund_cluster' => ['required' => 'Funds Cluster is required.'],
            'po_fund_available' => ['required' => 'Funds Available is required.'],
            'po_accountant' => ['required' => 'Accountant is required.'],
            'po_orsburs' => ['required' => 'ORS / BURS NO. is required.'],
            'po_date_orsburs' => ['required' => 'Date of the ORS / BURS is required.'],
            'po_amount' => ['required' => 'Amount is required.', 'numeric' => 'Amount must be numeric.'],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userData = $this->loadUserSession();
        $db = \Config\Database::connect();
        $poId = $this->request->getPost('po_id');

        $db->transStart();

        try {
            $poData = [
                'po_supplier' => $this->request->getPost('po_supplier'),
                'po_address' => $this->request->getPost('po_address'),
                'po_tele' => $this->request->getPost('po_tele'),
                'po_tin' => $this->request->getPost('po_tin'),
                'po_ponumber' => $this->request->getPost('po_ponumber'),
                'po_date' => $this->request->getPost('po_date'),
                'po_mode' => $this->request->getPost('po_mode'),
                'po_tuptin' => $this->request->getPost('po_tuptin'),
                'po_place_delivery' => $this->request->getPost('po_place_delivery'),
                'po_date_delivery' => $this->request->getPost('po_date_delivery'),
                'po_delivery_term' => $this->request->getPost('po_delivery_term'),
                'po_payment_term' => $this->request->getPost('po_payment_term'),
                'po_description' => $this->request->getPost('po_description'),
                'po_amount_in_words' => $this->request->getPost('po_amount_in_words'),
                'po_total_amount' => $this->request->getPost('po_total_amount'),
                'conforme_name_of_supplier' => $this->request->getPost('conforme_name_of_supplier'),
                'conforme_date' => $this->request->getPost('conforme_date'),
                'conforme_campus_director' => $this->request->getPost('conforme_campus_director'),
                'po_fund_cluster' => $this->request->getPost('po_fund_cluster'),
                'po_fund_available' => $this->request->getPost('po_fund_available'),
                'po_accountant' => $this->request->getPost('po_accountant'),
                'po_orsburs' => $this->request->getPost('po_orsburs'),
                'po_date_orsburs' => $this->request->getPost('po_date_orsburs'),
                'po_amount' => $this->request->getPost('po_amount'),
                'saved_by_user_id_fk' => $userData['user_id'],
                'po_status' => 'Draft',
            ];

            if ($poId) {
                $this->poModel->update($poId, $poData);
                $poItems = $this->poItemModel->where('po_items_id_fk', $poId)->findAll();
                foreach($poItems as $poItem) {
                    $this->poItemSpecModel->where('po_item_specs_id_fk', $poItem['po_items_id'])->delete();
                }
                $this->poItemModel->where('po_items_id_fk', $poId)->delete();
                $message = 'Purchase Order updated successfully.';
            } else {
                $this->poModel->insert($poData);
                $poId = $this->poModel->getInsertID();
                $message = 'Purchase Order saved successfully.';
            }

            $items = $this->request->getPost('items') ?? [];
            foreach ($items as $item) {
                $poItemData = [
                    'po_items_id_fk' => $poId,
                    'po_items_stockno' => $item['po_items_stockno'],
                    'po_items_unit' => $item['po_items_unit'],
                    'po_items_descrip' => $item['po_items_descrip'],
                    'po_items_quantity' => $item['po_items_quantity'],
                    'po_items_cost' => $item['po_items_cost'],
                    'po_items_amount' => $item['po_items_amount'],
                ];
                $this->poItemModel->insert($poItemData);
                $poItemId = $this->poItemModel->getInsertID();

                if (!empty($item['specifications'])) {
                    foreach ($item['specifications'] as $spec) {
                        $this->poItemSpecModel->insert([
                            'po_item_specs_id_fk' => $poItemId,
                            'po_item_spec_descrip' => $spec
                        ]);
                    }
                }
            }

            $taskData = [
                'submitted_by' => $userData['user_id'],
                'submitted_to' => null,
                'po_id_fk' => $poId,
                'task_type' => 'Purchase Order',
                'task_description' => 'A Purchase Order has been saved and is ready for submission.'
            ];

            $existingTask = $this->taskModel->getTaskByPoId($poId);
            if ($existingTask) {
                $this->taskModel->update($existingTask['task_id'], $taskData);
            } else {
                $this->taskModel->insert($taskData);
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'An error occurred while saving the Purchase Order.');
            }

            return redirect()->to('po/create/' . $poId)->with('success', $message);

        } catch (\Exception $e) {
            log_message('error', 'PO Save Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function submit()
    {
        $db = \Config\Database::connect();
        $poId = $this->request->getPost('po_id');

        $po = $this->poModel->find($poId);
        if ($po && $po['po_status'] !== 'Draft') {
            return redirect()->to('po/create/' . $poId)->with('error', 'This Purchase Order has already been submitted.');
        }

        $director = $this->userModel->getDirector();
        if (empty($director)) {
            return redirect()->back()->with('error', 'Cannot submit: No Campus Director found in the system.');
        }

        $db->transStart();

        try {
            $task = $this->taskModel->getTaskByPoId($poId);
            if ($task) {
                $this->taskModel->update($task['task_id'], [
                    'submitted_to' => $director['user_id'],
                    'task_description' => 'A new Purchase Order has been submitted for your review.',
                ]);
            } else {
                return redirect()->back()->with('error', 'Cannot find the original task to submit.');
            }

            $this->poModel->update($poId, ['po_status' => 'Pending']);

            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'Failed to submit Purchase Order due to a database error.');
            }

            return redirect()->to('/po/create/' . $poId)->with('success', 'Purchase Order successfully submitted to Campus Director for review.');

        } catch (\Exception $e) {
            log_message('error', 'PO Submission Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred during submission.');
        }
    }

    public function preview($poId)
    {
        $poModel = new PoModel();
        $poItemModel = new PoItemModel();
        $poItemSpecModel = new PoItemSpecModel();
        $departmentModel = new DepartmentModel();
        $userModel = new UserModel();
        $prModel = new PrModel();

        $po = $poModel->find($poId);
        
        if (empty($po)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Purchase Order not found');
        }

        $poItems = $poItemModel->where('po_items_id_fk', $poId)->findAll();

        // Load specifications for each item
        foreach($poItems as &$item) {
            $item['specifications'] = $poItemSpecModel->where('po_item_specs_id_fk', $item['po_items_id'])->findAll();
        }

        $pr = [];
        if (!empty($po['pr_id_fk'])) {
            $pr = $prModel->find($po['pr_id_fk']);
        }

        $data = [
            'po' => $po,
            'po_items' => $poItems,
            'department' => !empty($pr['pr_department']) ? $departmentModel->getDepartmentNameById($pr['pr_department']) : 'N/A',
            'requested_by' => !empty($pr['pr_requested_by_name']) ? $userModel->getUserFullNameById($pr['pr_requested_by_name']) : 'N/A',
            'approved_by' => !empty($pr['pr_approved_by_name']) ? $userModel->getUserFullNameById($pr['pr_approved_by_name']) : 'N/A',
            'po_requested_by_position' => $pr['pr_requested_by_position'] ?? '',
            'po_approved_by_position' => $pr['pr_approved_by_position'] ?? '',
            'po_reviewed_by_position' => $po['po_reviewed_by_position'] ?? '',
            'reviewed_by' => isset($po['po_reviewed_by_name']) ? $userModel->getUserFullNameById($po['po_reviewed_by_name']) : '',
        ];

        return view('preview-pages/po-preview', $data);
    }
}