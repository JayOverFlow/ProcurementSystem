<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaskModel;
use App\Models\PpmpModel;

class TasksController extends BaseController
{
    protected $taskModel;
    protected $ppmpModel;

    public function __construct() {
        $this->taskModel = new TaskModel();
        $this->ppmpModel = new PpmpModel();
    }

    public function index()
    {
        $userData = $this->loadUserSession();
        $tasks = $this->taskModel->getTasksForUser($userData['user_id']);

        $data = [
            'user_data' => $userData,
            'tasks' => $tasks
        ];

        $role = $userData['gen_role'] ?? null;

        switch ($role) {
            case 'Director':
                return view('user-pages/director/dir-tasks', $data);
            case 'Planning Officer':
                return view('user-pages/planning/plan-tasks', $data);
            case 'Head':
                return view('user-pages/department-head/dh-tasks', $data);
            case 'Faculty': // = Section Head
                return view('user-pages/faculty/fac-tasks', $data);
            case 'Procurement':
                return view('user-pages/procurement/pro-tasks', $data);
            case 'Supply':
                return view('user-pages/supply/sup-tasks', $data);
            default:
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
} 