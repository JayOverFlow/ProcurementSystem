<?php

namespace App\Controllers\Planning;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\TaskModel;

class PlanningTasksController extends BaseController
{

    protected $userModel;
    protected $taskModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->taskModel = new TaskModel();
    }   

    public function index()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Get tasks
        $tasks = $this->taskModel->getPlanningTasksById($userData['user_id']);

        // Store data
        $data = [
            'user_data' => $userData,
            'tasks' => $tasks
        ];

        // Return view with stored data
        return view('user-pages/planning/plan-tasks', $data);
    }
}
