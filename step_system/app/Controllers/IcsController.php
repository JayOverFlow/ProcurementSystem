<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class IcsController extends BaseController
{
    public function index()
    {
        $userData = $this->loadUserSession();

        $data = [
            'user_data' => $userData
        ];

        return view('user-pages/supply/sup-ics', $data);
    }
}
