<?php

namespace App\Controllers\Unassigned;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UnassignedTasksController extends BaseController
{
    public function index()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];

        // Return view with stored data
        return view('user-pages/unassigned/unassigned-tasks', $data);
    }
}
