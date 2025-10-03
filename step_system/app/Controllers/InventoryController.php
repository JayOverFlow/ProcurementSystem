<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class InventoryController extends BaseController
{
    public function index()
    {
        $userData = $this->loadUserSession();

        $data = [
            'user_data' => $userData,
        ];

        switch ($userData['gen_role']) {
            case 'Procurement':
                return view('user-pages/procurement/pro-inventory', $data);
                break;
            case 'Supply':
                return view('user-pages/supply/sup-inventory', $data);
                break;
            default:
                return view('general-pages/404');
                break;
        }
    }
}
