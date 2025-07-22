<?php

namespace App\Controllers\Supply;

use App\Controllers\ProcurementBaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MrItemModel;

class SupplyController extends ProcurementPageController
{
    public function dashboard()
    {

        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];
        // We should return page with user data from database
        return view('user-pages/supply/sup-dashboard', $data);
    }

    public function procurement()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();
        $userId = $userData['user_id'];

        $forms = $this->getUsersForms($userId);

        // Store data
        $data = [
            'user_data' => $userData,
            'forms' => $forms
        ];
        return view('user-pages/supply/sup-procurement', $data);
    }

    public function tasks()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];
        return view('user-pages/supply/sup-tasks', $data);
    }

    public function mr()
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
        
        return view('user-pages/supply/sup-mr', $data);
    }

    public function ppmp()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];
        return view('user-pages/supply/sup-ppmp', $data);
    }
    public function pr()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];
        return view('user-pages/supply/sup-pr', $data);
    }

    public function par()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];
        return view('user-pages/supply/sup-par', $data);
    }

    public function ics()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];
        return view('user-pages/supply/sup-ics', $data);
    }

    public function su()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];
        return view('user-pages/supply/su', $data);
    }
}
