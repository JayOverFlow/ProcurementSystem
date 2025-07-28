<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PrModel;
use App\Models\PrItemModel;
use App\Models\PoModel;
use App\Models\PoItemModel;
use App\Models\PoItemSpecModel;
use App\Models\DepartmentModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class PreviewController extends BaseController
{
    public function postPreviewPO($poId = null)
    {
        // If no PO ID provided, return view with fallback data
        if ($poId === null) {
            $data = [
                'po' => [],
                'po_items' => [],
                'department' => 'N/A',
                'requested_by' => 'N/A',
                'approved_by' => 'N/A'
            ];
            return view('preview-pages/po-preview', $data);
        }
        
        $poModel = new PoModel();
        $poItemModel = new PoItemModel();
        $poItemSpecModel = new PoItemSpecModel();
        $departmentModel = new DepartmentModel();
        $userModel = new UserModel();
        
        $po = $poModel->find($poId);
        
        if (empty($po)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Purchase Order not found');
        }
        
        $poItems = $poItemModel->where('po_items_id_fk', $poId)->findAll();
        
        // Load specifications for each item
        foreach($poItems as &$item) {
            $item['specifications'] = $poItemSpecModel->where('po_item_specs_id_fk', $item['po_items_id'])->findAll();
        }
        
        $data = [
            'po' => $po,
            'po_items' => $poItems,
            'department' => isset($po['po_department']) ? $departmentModel->getDepartmentNameById($po['po_department']) : 'N/A',
            'requested_by' => isset($po['po_requested_by_name']) ? $userModel->getUserFullNameById($po['po_requested_by_name']) : 'N/A',
            'approved_by' => isset($po['po_approved_by_name']) ? $userModel->getUserFullNameById($po['po_approved_by_name']) : 'N/A',
        ];
        
        return view('preview-pages/po-preview', $data);
    }
    
    public function postPreviewPR($prId = null)
    {
        // If no PR ID provided, return static view
        if ($prId === null) {
            return view('preview-pages/pr-preview');
        }
        
        $prModel = new PrModel();
        $prItemModel = new PrItemModel();
        $departmentModel = new DepartmentModel();
        $userModel = new UserModel();
        
        $pr = $prModel->find($prId);
        $prItems = $prItemModel->where('pr_id_fk', $prId)->findAll();
        
        if (empty($pr)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Purchase Request not found');
        }
        
        $data = [
            'pr' => $pr,
            'pr_items' => $prItems,
            'department' => $departmentModel->getDepartmentNameById($pr['pr_department']),
            'requested_by' => $userModel->getUserFullNameById($pr['pr_requested_by_name']),
            'approved_by' => $userModel->getUserFullNameById($pr['pr_approved_by_name']),
        ];
        
        return view('preview-pages/pr-preview', $data);
    }
}
