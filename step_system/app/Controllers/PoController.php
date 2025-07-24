<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PoModel;
use App\Models\PoItemModel;
use App\Models\PoItemSpecModel;
use App\Models\TaskModel;

class PoController extends BaseController
{
    protected $poModel;
    protected $poItemModel;
    protected $poItemSpecModel;
    protected $taskModel;

    public function __construct() {
        $this->poModel = new PoModel();
        $this->poItemModel = new PoItemModel();
        $this->poItemSpecModel = new PoItemSpecModel();
        $this->taskModel = new TaskModel();
    }

    public function index()
    {
        $userData = $this->loadUserSession();

        $data = [
            'user_data' => $userData,
        ];

        // If the user is not a Planning Officer
        if (($userData['gen_role'] ?? null) !== 'Procurement') {
            return redirect()->back()->with('error', 'This page is restricted.');
        }

        return view('user-pages/procurement/pro-po', $data);
    }

    public function save()
    {
        $userData = $this->loadUserSession();
        $db = \Config\Database::connect();
        
        $db->transStart();
        try {
            // 1. Insert into po_tbl
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
            $this->poModel->insert($poData);
            $poId = $this->poModel->getInsertID();

            // 2. Insert Items and Specifications
            $items = $this->request->getPost('items') ?? [];
            foreach ($items as $item) {
                $itemData = [
                    'po_items_id_fk' => $poId,
                    'po_items_stockno' => $item['po_items_stockno'],
                    'po_items_unit' => $item['po_items_unit'],
                    'po_items_descrip' => $item['po_items_descrip'],
                    'po_items_quantity' => $item['po_items_quantity'],
                    'po_items_cost' => $item['po_items_cost'],
                    'po_items_amount' => $item['po_items_amount'],
                ];
                $this->poItemModel->insert($itemData);
                $poItemId = $this->poItemModel->getInsertID();

                if (!empty($item['specifications'])) {
                    $specData = [];
                    foreach($item['specifications'] as $spec) {
                        $specData[] = [
                            'po_item_specs_id_fk' => $poItemId,
                            'po_item_spec_descrip' => $spec,
                        ];
                    }
                    $this->poItemSpecModel->insertBatch($specData);
                }
            }

            // 3. Create Task
            $taskData = [
                'submitted_by' => $userData['user_id'],
                'submitted_to' => null,
                'po_id_fk' => $poId,
                'task_type' => 'Purchase Order',
                'task_description' => 'A new Purchase Order has been submitted for your review.',
            ];
            $this->taskModel->insert($taskData);

            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'Failed to save Purchase Order. Please try again.');
            }

            return redirect()->to('/po/create')->with('success', 'Purchase Order saved successfully.');

        } catch (\Exception $e) {
            log_message('error', 'PO Saving/Submission Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
}
