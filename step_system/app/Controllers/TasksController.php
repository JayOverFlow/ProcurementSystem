<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaskModel;
use App\Models\PpmpModel;
use App\Models\AppModel;
use App\Models\PrModel; // Added PrModel
use App\Models\PoModel; // Added PoModel
use App\Models\ParModel; // Added ParModel
use App\Models\IcsModel; // Added IcsModel
use App\Models\UserModel;

class TasksController extends BaseController
{
    protected $taskModel;
    protected $ppmpModel;
    protected $appModel;
    protected $prModel; // Declared PrModel
    protected $poModel; // Declared PoModel
    protected $parModel; // Declared ParModel
    protected $icsModel; // Declared IcsModel
    protected $userModel;

    public function __construct() {
        $this->taskModel = new TaskModel();
        $this->ppmpModel = new PpmpModel();
        $this->appModel = new AppModel();
        $this->prModel = new PrModel();
        $this->poModel = new PoModel();
        $this->parModel = new ParModel(); // Initialized ParModel
        $this->icsModel = new IcsModel(); // Initialized IcsModel
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $userData = $this->loadUserSession();
        $role = $userData['gen_role'] ?? null;

        // Determine task type based on role
        $headsRoles = ['Director', 'Planning Officer', 'Head', 'Procurement', 'Supply', 'Assistant Director'];
        $nonHeadRoles = ['Faculty', null]; // Faculty = Section Head, null = Unassigned

        if (in_array($role, $headsRoles)) {
            return $this->headsTasksPage($userData);
        } elseif (in_array($role, $nonHeadRoles)) {
            return $this->nonHeadTasksPage($userData);
        } else {
            // Fallback for any other roles
            return $this->nonHeadTasksPage($userData);
        }
    }

    // Task Page for Heads
    // Approves submitted forms from subordinates
    private function headsTasksPage($userData)
    {
        // Get tasks for heads - submitted forms from subordinates
        $tasks = $this->taskModel->getTasksForUser($userData['user_id']);

        $role = $userData['gen_role'] ?? null;

        // Dynamically generate filter options from the tasks list
        $taskTypesInTable = array_unique(array_column($tasks, 'task_type'));

        $filterOptions = ['ALL' => 'ALL'];
        $taskTypeMap = [
            'Project Procurement Management Plan' => 'PPMP',
            'Annual Procurement Plan' => 'APP',
            'Purchase Request' => 'PR',
            'Purchase Order' => 'PO',
            'Property Acknowledgement Receipt' => 'PAR',
            'Inventory Custodian Slip' => 'ICS'
        ];

        foreach ($taskTypesInTable as $taskType) {
            if (isset($taskTypeMap[$taskType])) {
                $label = $taskTypeMap[$taskType];
                $filterOptions[$label] = $taskType;
            }
        }

        // Sort the options alphabetically by label, keeping ALL first
        $allOption = $filterOptions['ALL'];
        unset($filterOptions['ALL']);
        ksort($filterOptions);
        $filterOptions = ['ALL' => $allOption] + $filterOptions;

        $data = [
            'user_data' => $userData,
            'tasks' => $tasks,
            'filter_options' => $filterOptions
        ];

        switch ($role) {
            case 'Director':
                return view('user-pages/director/dir-tasks', $data);
            case 'Planning Officer':
                return view('user-pages/planning/plan-tasks', $data);
            case 'Head':
                return view('user-pages/head/head-tasks', $data);
            case 'Procurement':
                return view('user-pages/procurement/pro-tasks', $data);
            case 'Supply':
                return view('user-pages/supply/sup-tasks', $data);
            default:
                return view('user-pages/head/head-tasks', $data); // Default to head tasks
        }
    }

    // Task Page for Section Heads and Unassigned users (Faculty/Section Head, Unassigned)
    // Receives assignments from the Heads
    private function nonHeadTasksPage($userData)
    {
        // Get assignments/tasks for section heads and unassigned users
        $tasks = $this->taskModel->getTasksForUser($userData['user_id']);

        $data = [
            'user_data' => $userData,
            'tasks' => $tasks
        ];

        $role = $userData['gen_role'] ?? null;

        switch ($role) {
            case 'Faculty': // = Section Head
                return view('user-pages/faculty/fac-tasks', $data);
            default: // Unassigned and any other roles
                return view('user-pages/unassigned/unassigned-tasks', $data);
        }
    }

    public function getDetails($taskId)
    {
        $task = $this->taskModel->getTaskDetails($taskId);

        if ($task) {
            return $this->response->setJSON($task);
        }

        return $this->response->setStatusCode(404, 'Task not found');
    }

    public function updatePpmpStatus()
    {
        $json = $this->request->getJSON();
        $ppmpId = $json->ppmp_id ?? null;
        $status = $json->status ?? null;

        if (!$ppmpId || !in_array($status, ['Approved', 'Rejected'])) {
            return $this->response->setStatusCode(400, 'Invalid data provided.');
        }

        if ($this->ppmpModel->updateStatus($ppmpId, $status)) {
            return $this->response->setJSON(['success' => true]);
        }
        
        return $this->response->setStatusCode(500, 'Failed to update status.');
    }

    public function updateAppStatus()
    {
        $json = $this->request->getJSON();
        $appId = $json->app_id ?? null;
        $status = $json->status ?? null;

        if (!$appId || !in_array($status, ['Approved', 'Rejected'])) {
            return $this->response->setStatusCode(400, 'Invalid data provided.');
        }

        if ($this->appModel->update($appId, ['app_status' => $status])) {
            return $this->response->setJSON(['success' => true]);
        }
        
        return $this->response->setStatusCode(500, 'Failed to update status.');
    }

    public function updatePrStatus()
    {
        $json = $this->request->getJSON();
        $prId = $json->pr_id ?? null;
        $status = $json->status ?? null;

        if (!$prId || !in_array($status, ['Approved', 'Rejected'])) {
            return $this->response->setStatusCode(400, 'Invalid data provided.');
        }

        if ($this->prModel->updateStatus($prId, $status)) {
            return $this->response->setJSON(['success' => true]);
        }
        
        return $this->response->setStatusCode(500, 'Failed to update status.');
    }

    public function updatePoStatus()
    {
        $json = $this->request->getJSON();
        $poId = $json->po_id ?? null;
        $status = $json->status ?? null;

        if (!$poId || !in_array($status, ['Approved', 'Rejected'])) {
            return $this->response->setStatusCode(400, 'Invalid data provided.');
        }

        if ($this->poModel->updateStatus($poId, $status)) {
            return $this->response->setJSON(['success' => true]);
        }
        
        return $this->response->setStatusCode(500, 'Failed to update status.');
    }

    public function updateParStatus()
    {
        $json = $this->request->getJSON();
        $parId = $json->par_id ?? null;
        $status = $json->status ?? null;

        if (!$parId || !in_array($status, ['Approved', 'Rejected'])) {
            return $this->response->setStatusCode(400, 'Invalid data provided.');
        }

        if ($this->parModel->update($parId, ['prop_ack_status' => $status])) {
            return $this->response->setJSON(['success' => true]);
        }

        return $this->response->setStatusCode(500, 'Failed to update status.');
    }

    public function updateIcsStatus()
    {
        $json = $this->request->getJSON();
        $icsId = $json->ics_id ?? null;
        $status = $json->status ?? null;

        if (!$icsId || !in_array($status, ['Approved', 'Rejected'])) {
            return $this->response->setStatusCode(400, 'Invalid data provided.');
        }

        if ($this->icsModel->update($icsId, ['invent_custo_status' => $status])) {
            return $this->response->setJSON(['success' => true]);
        }

        return $this->response->setStatusCode(500, 'Failed to update status.');
    }
} 