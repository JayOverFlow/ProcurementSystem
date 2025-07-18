<?php

namespace App\Controllers\Faculty;

use App\Controllers\BaseController;
use App\Models\MrItemModel;
use CodeIgniter\HTTP\ResponseInterface;

class FacultyDashboardController extends BaseController
{
    public function index()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        $mrItemModel = new MrItemModel();
        $mrItems = $mrItemModel->getMrItemsByUserId($userData['user_id']);

        // Store data
        $data = [
            'user_data' => $userData,
            'mr_items' => $mrItems
        ];

        // Return view with stored data
        return view('user-pages/faculty/fac-dashboard', $data);
    }
}
