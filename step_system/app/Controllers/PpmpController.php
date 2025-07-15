<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PpmpModel;
use App\Models\PpmpItemModel;

class PpmpController extends BaseController
{
    public function create()
    {
        $ppmpModel = new PpmpModel();
        $ppmpItemModel = new PpmpItemModel();
        $db = \Config\Database::connect();

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
                'ppmp_remarks' => 'Testing: PPMP submitted'
            ];

            $ppmpModel->insert($ppmpData);
            $ppmpId = $ppmpModel->getInsertID();

            // 2. Prepare and insert into ppmp_items_tbl
            $allItems = [];
            $mooeItems = $this->request->getPost('items') ?? [];
            $coItems = $this->request->getPost('items_co') ?? [];
            
            $items = array_merge($mooeItems, $coItems);

            foreach ($items as $item) {
                // Skip empty rows
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
                    'ppmp_sched_jan' => isset($months['jan']) ? 1 : 0,
                    'ppmp_sched_feb' => isset($months['feb']) ? 1 : 0,
                    'ppmp_sched_mar' => isset($months['mar']) ? 1 : 0,
                    'ppmp_sched_apr' => isset($months['apr']) ? 1 : 0,
                    'ppmp_sched_may' => isset($months['may']) ? 1 : 0,
                    'ppmp_sched_jun' => isset($months['jun']) ? 1 : 0,
                    'ppmp_sched_jul' => isset($months['jul']) ? 1 : 0,
                    'ppmp_sched_aug' => isset($months['aug']) ? 1 : 0,
                    'ppmp_sched_sep' => isset($months['sep']) ? 1 : 0,
                    'ppmp_sched_oct' => isset($months['oct']) ? 1 : 0,
                    'ppmp_sched_nov' => isset($months['nov']) ? 1 : 0,
                    'ppmp_sched_dec' => isset($months['dec']) ? 1 : 0,
                ];
            }

            if (!empty($allItems)) {
                $ppmpItemModel->insertBatch($allItems);
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'Failed to create PPMP.');
            } else {
                return redirect()->back()->with('success', 'PPMP created successfully!');
            }

        } catch (\Exception $e) {
            log_message('error', 'PPMP Creation Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
} 