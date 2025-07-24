<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AppModel;
use App\Models\AppItemModel;
use App\Models\TaskModel;
use App\Models\UserModel;
use App\Models\DepartmentModel;

class AppController extends BaseController
{
    protected $userModel;
    protected $appModel;
    protected $appItemModel;
    protected $taskModel;
    protected $departmentModel;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->appModel = new AppModel();
        $this->appItemModel = new AppItemModel();
        $this->taskModel = new TaskModel();
        $this->departmentModel = new DepartmentModel();
    }

    public function index()
    {
        $userData = $this->loadUserSession();
        $users = $this->userModel->getAllUsers();
        $departments = $this->departmentModel->getAllDepartments();

        $data = [
            'user_data' => $userData,
            'users' => $users,
            'departments' => $departments
        ];
        
        // If the user is not a Planning Officer
        if (($userData['gen_role'] ?? null) !== 'Planning Officer') {
            return redirect()->back()->with('error', 'This page is restricted.');
        }

        return view('user-pages/planning/plan-app', $data);
    }

    public function create()
    {
        $userData = $this->loadUserSession();
        // $appModel = new AppModel();
        // $appItemModel = new AppItemModel();
        // $taskModel = new TaskModel();
        // $userModel = new UserModel();
        $db = \Config\Database::connect();
        // $userId = session()->get('user_id');

        $db->transStart();

        try {
            // 1. Insert into app_tbl
            $appData = [
                'app_status' => 'Draft',
                'saved_by_user_id_fk' => $userData['user_id'],
                'app_prepared_by_name' => $this->request->getPost('app_prepared_by_name'),
                'app_prepared_by_designation' => $this->request->getPost('prepared_by_designation'),
                'app_recommending_by_name' => $this->request->getPost('app_recommending_by_name'),
                'app_recommending_by_designation' => $this->request->getPost('recommending_approval_designation'),
                'app_approved_by_name' => $this->request->getPost('app_approved_by_name'),
                'app_approved_by_designation' => $this->request->getPost('approved_by_designation'),
                'app_dep_id_fk' => $this->request->getPost('app_dep_id_fk'),
            ];
            $this->appModel->insert($appData);
            $appId = $this->appModel->getInsertID();

            // 2. Prepare and insert into app_items_tbl
            $items = $this->request->getPost('items') ?? [];
            $itemData = [];
            foreach ($items as $item) {
                // Skip the row only if both code and project name are empty
                // if (empty($item['app_item_code']) && empty($item['procurement_project'])) {
                //     continue;
                // }
                
                $itemData[] = [
                    'app_id_fk' => $appId,
                    'app_item_code' => $item['app_item_code'],
                    'app_item_name' => $item['procurement_project'],
                    'app_item_pmo' => $item['pmo_end_user'],
                    'app_item_mode' => $item['mode_of_procurement'],
                    'app_item_adspost' => $item['ads_post'],
                    'app_item_subopen' => $item['sub_open'],
                    'app_item_notice' => $item['notice_award'],
                    'app_item_contract' => $item['contract_signing'],
                    'app_item_source_fund' => $item['source_of_funds'],
                    'app_item_estimated_total' => $item['total'],
                    'app_item_estimated_mooe' => $item['mooe'],
                    'app_item_estimated_co' => $item['co'],
                ];
            }
            if (!empty($itemData)) {
                $this->appItemModel->insertBatch($itemData);
            }

            // // 3. Create tasks for Campus Director
            // $directors = $userModel->getUsersByRoleName('Campus Director');

            // if (empty($directors)) {
            //     $db->transRollback();
            //     return redirect()->back()->with('error', "Failed to submit APP: No user with the role 'Campus Director' was found.");
            // }

            // foreach ($directors as $directorId) {
            //     $taskModel->insert([
            //         'submitted_by' => $userId,
            //         'submitted_to' => $directorId,
            //         'app_id_fk' => $appId,
            //         'task_type' => 'Annual Procurement Plan',
            //         'task_description' => 'A new Annual Procurement Plan has been submitted for your review.'
            //     ]);
            // }

            $this->taskModel->insert([
                'submitted_by' => $userData['user_id'],
                'submitted_to' => null,
                'app_id_fk' => $appId,
                'task_type' => 'Annual Procurement Plan',
                'task_description' => 'A new Annual Procurement Plan has been submitted for your review.'
            ]);
            
            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'An error occurred while saving the Annual Procurement Plan.');
            }
            return redirect()->back()->with('success', 'Annual Procurement Plan has been saved.');

        } catch (\Exception $e) {
            log_message('error', 'APP Creation/Submission Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function preview($appId)
    {
        $appModel = new AppModel();
        $appItemModel = new AppItemModel();

        $app = $appModel->find($appId);
        if (!$app) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('APP not found');
        }

        $items = $appItemModel->where('app_id_fk', $appId)->findAll();

        $data = [
            'app'   => $app,
            'items' => $items,
        ];
        
        return view('preview-pages/app-preview', $data);
    }
}
