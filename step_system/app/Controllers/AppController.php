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

    public function index($appId = null)
    {
        $userData = $this->loadUserSession();
        $users = $this->userModel->getAllUsers();
        $departments = $this->departmentModel->getAllDepartments();

        $data = [
            'user_data' => $userData,
            'users' => $users,
            'departments' => $departments,
            'app' => null, // Will hold the APP main data if editing an existing form
            'app_items' => [] // Will hold the APP items data if editing an existing form
        ];

        // If an appId is provided in the URL, fetch the existing APP data
        if ($appId) {
            $app = $this->appModel->find($appId);
            if ($app) {
                // If APP found, fetch its associated items
                $appItems = $this->appItemModel->where('app_id_fk', $appId)->findAll();
                // Populate the data array with existing APP and its items
                $data['app'] = $app;
                $data['app_items'] = $appItems;
            }
        }
        
        // If the user is not a Planning Officer
        if (($userData['gen_role'] ?? null) !== 'Planning Officer') {
            return redirect()->back()->with('error', 'This page is restricted.');
        }

        return view('user-pages/planning/plan-app', $data);
    }

    public function save()
    {
        $userData = $this->loadUserSession();
        $db = \Config\Database::connect();


        // Validation rules
        $rules = [
            'app_dep_id_fk' => [
                'label' => 'Department',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please select a department.'
                ]
            ],
            'app_prepared_by_name' => [
                'label' => 'Printed Name',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please select who prepared this document.'
                ]
            ],
            'prepared_by_designation' => [
                'label' => 'Designation',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Designation is a required field.'
                ]
            ],
            'app_approved_by_name' => [
                'label' => 'Printed Name',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please select the approver.'
                ]
            ],
            'approved_by_designation' => [
                'label' => 'Designation',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Approver designation is a required field.'
                ]
            ],
            'app_recommending_by_name' => [
                'label' => 'Printed Name',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please select who is recommending approval.'
                ]
            ],
            'recommending_approval_designation' => [
                'label' => 'Designation',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Recommender designation is a required field.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Custom validation for at least one item
        $items = $this->request->getPost('items') ?? [];
        $hasAtLeastOneItem = false;
        if (!empty($items)) {
            foreach ($items as $item) {
                // If any value in the item row is not empty, we consider it a valid item.
                // array_filter without a callback removes falsy values (empty string, null, 0, false).
                if (count(array_filter($item)) > 0) {
                    $hasAtLeastOneItem = true;
                    break;
                }
            }
        }

        if (!$hasAtLeastOneItem) {
            // Since the main validation passed, we create a new errors array for our custom item validation.
            return redirect()->back()->withInput()->with('errors', ['items' => 'No data was entered.']);
        }

        $appId = $this->request->getPost('app_id'); // Get app_id from hidden input


        $db->transStart();

        try {
            // 1. Insert or Update app_tbl
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

            if ($appId) {
                // Update existing APP
                $this->appModel->update($appId, $appData);
            } else {
                // Insert new APP
                $this->appModel->insert($appData);
                $appId = $this->appModel->getInsertID();
            }

            // Clear existing items before inserting new ones to prevent duplicates
            if ($appId) {
                $this->appItemModel->where('app_id_fk', $appId)->delete();
            }

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
                return redirect()->to('app/create/' . $appId)->with('error', 'An error occurred while saving the Annual Procurement Plan.');
            }
            return redirect()->to('app/create/' . $appId)->with('success', 'Annual Procurement Plan has been saved.');

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

    public function submit() {
        $db = \Config\Database::connect(); // Database connection
        $appId = $this->request->getPost('app_id'); // Get the app_id from hidden input field

        // If the document already submitted
        $app = $this->appModel->find($appId);
        if ($app && $app['app_status'] !== 'Draft') {
            return redirect()->to('app/create/' . $appId)->with('error', 'This Annual Procurement Plan has already been submitted.');
        }

        $director = $this->userModel->getDirector(); // Get Director
        // If there's no Director
        if (empty($director)) {
            return redirect()->back()->with('error', 'Cannot submit: No Planning Officer found in the system.');
        }

        $db->transStart(); // Start db transaction

        try {
            $task = $this->getTaskByAppId($appId); // Get task corresponds to appId
            // If task found
            if ($task) {
                // Update task to submit to director
                $this->taskModel->update($task['task_id'],[
                    'submitted_to' => $director,
                    'task_description' => 'A new Annual Procurement Plan has been submitted for your review.',
                ]);
            } else { // If task not found
                return redirect()->back()->with('error', 'Cannot find the original task to submit.');
            }

            $this->appModel->update($appId, ['app_status' => 'Pending']); // Update the app_status to Pending

            $db->transComplete(); // Complete the database transaction

            // If transaction failed
            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'Failed to submit Project Procurement Management Plan due to a database error.');
            }

            // Redirect back with succesful message
            return redirect()->to('app/create' . $appId)->with('success', 'Annual Procurement Plan successfully submitted to Campus Director for review.');

        } catch (\Exception $e) {
            log_message('error', 'APP Submission Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred during submission.');
        }
    }
}
