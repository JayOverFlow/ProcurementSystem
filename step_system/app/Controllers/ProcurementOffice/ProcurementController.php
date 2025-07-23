<?php

namespace App\Controllers\ProcurementOffice;

use App\Controllers\ProcurementPageController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MrItemModel;

class ProcurementController extends ProcurementPageController
{
    public function dashboard()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];

        return view('user-pages/procurement/pro-dashboard', $data);
    }

    public function index()
    {
        $userData = $this->loadUserSession();
        $userId = $userData['user_id'];

        $forms = $this->getUsersForms($userId);

        $data = [
            'user_data' => $userData,
            'forms' => $forms
        ];
        return view('user-pages/procurement/pro-procurement', $data);
    }


    public function tasks()
    {
         // Get user data via user session using custom helper
         $userData = $this->loadUserSession();

         // Store data
         $data = [
             'user_data' => $userData
         ];
        return view('user-pages/procurement/pro-tasks', $data);
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

        return view('user-pages/procurement/pro-mr', $data);
    }

    public function ppmp()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];
        return view('user-pages/procurement/pro-ppmp', $data);
    }

    public function pr()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];
        return view('user-pages/procurement/pro-pr', $data);
    }
    public function po()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];
        return view('user-pages/procurement/pro-po', $data);
    }
    public function inventory()
    {
        // Get user data via user session using custom helper
        $userData = $this->loadUserSession();

        // Store data
        $data = [
            'user_data' => $userData
        ];
        return view('user-pages/procurement/pro-inventory', $data);
    }

}

