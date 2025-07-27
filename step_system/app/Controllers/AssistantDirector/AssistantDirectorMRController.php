<?php

namespace App\Controllers\AssistantDirector;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MrItemModel;

class AssistantDirectorMRController extends BaseController
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
        return view('user-pages/assistant-director/assistant-director-mr', $data);
    }
}
