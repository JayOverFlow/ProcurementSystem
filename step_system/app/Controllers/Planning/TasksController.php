<?php

namespace App\Controllers\Planning;

use App\Controllers\BaseController;
use App\Models\TaskModel;

class TasksController extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();
        $userId = session()->get('user_id');

        $data['tasks'] = $taskModel->getTasksForUser($userId);

        return view('user-pages/planning/plan-tasks', $data);
    }

    public function getDetails($taskId)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->getTaskDetails($taskId);

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

        $ppmpModel = new \App\Models\PpmpModel();

        if ($ppmpModel->updateStatus($ppmpId, $status)) {
            return $this->response->setJSON(['success' => true]);
        }
        
        return $this->response->setStatusCode(500, 'Failed to update status.');
    }
} 