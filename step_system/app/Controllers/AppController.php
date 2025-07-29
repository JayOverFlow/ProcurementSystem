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
        $appId = $this->request->getPost('app_id'); // Get app_id from hidden input

        // Validation rules
        $rules = [
            'app_dep_id_fk' => 'required|greater_than[0]',
            'app_prepared_by_name' => 'required|greater_than[0]',
            'prepared_by_designation' => 'required',
            'app_recommending_by_name' => 'required|greater_than[0]',
            'recommending_approval_designation' => 'required',
            'app_approved_by_name' => 'required|greater_than[0]',
            'approved_by_designation' => 'required',
        ];

        $messages = [
            'app_dep_id_fk' => ['required' => 'Please select a Department.', 'greater_than' => 'Please select a Department.'],
            'app_prepared_by_name' => ['required' => 'Please select who prepared the document.', 'greater_than' => 'Please select who prepared the document.'],
            'prepared_by_designation' => ['required' => 'The designation for who prepared is required.'],
            'app_recommending_by_name' => ['required' => 'Please select who will recommend for approval.', 'greater_than' => 'Please select who will recommend for approval.'],
            'recommending_approval_designation' => ['required' => 'The designation for recommending approval is required.'],
            'app_approved_by_name' => ['required' => 'Please select who will approve the document.', 'greater_than' => 'Please select who will approve the document.'],
            'approved_by_designation' => ['required' => 'The designation for the approver is required.'],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

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

            // Create/Update task for this APP
            $taskData = [
                'submitted_by' => $userData['user_id'],
                'submitted_to' => null,
                'app_id_fk' => $appId,
                'task_type' => 'Annual Procurement Plan',
                'task_description' => 'An Annual Procurement Plan has been saved and is ready for submission.'
            ];

            $existingTask = $this->taskModel->where('app_id_fk', $appId)->first();

            if ($existingTask) {
                $this->taskModel->update($existingTask['task_id'], $taskData);
            } else {
                $this->taskModel->insert($taskData);
            }
            
            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'An error occurred while saving the Annual Procurement Plan.');
            }
            // return redirect()->back()->with('success', 'Annual Procurement Plan has been saved.');
            return redirect()->to('app/create/' . $appId)->with('success', 'Your Annual Procurement Plan has been saved.');

        } catch (\Exception $e) {
            log_message('error', 'APP Creation/Submission Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function preview($appId)
    {
        $appModel = new AppModel();
        $appItemModel = new AppItemModel();
        $userModel = new UserModel();

        // Fetch APP data with all fields including printed names
        $app = $appModel->find($appId);
        if (!$app) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('APP not found');
        }

        // Fetch APP items
        $items = $appItemModel->where('app_id_fk', $appId)->findAll();

        // Convert user IDs to actual user names for signature fields
        $userIdFields = [
            'app_prepared_by_name',
            'app_recommending_by_name',
            'app_approved_by_name'
        ];

        foreach ($userIdFields as $field) {
            if (!empty($app[$field]) && is_numeric($app[$field])) {
                // Fetch the actual user name using the user ID
                $userName = $userModel->getUserFullNameById($app[$field]);
                $app[$field] = $userName ?: 'Unknown User';
            } else {
                $app[$field] = $app[$field] ?: '';
            }
        }

        // Ensure designation fields have default values if empty
        $designationFields = [
            'app_prepared_by_designation',
            'app_recommending_by_designation',
            'app_approved_by_designation'
        ];

        foreach ($designationFields as $field) {
            if (!isset($app[$field]) || empty($app[$field])) {
                $app[$field] = '';
            }
        }

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
            $task = $this->taskModel->getTaskByAppId($appId); // Get task corresponds to appId
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
            return redirect()->to('/app/create/' . $appId)->with('success', 'Annual Procurement Plan successfully submitted to Campus Director for review.');

        } catch (\Exception $e) {
            log_message('error', 'APP Submission Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred during submission.');
        }
    }
}
