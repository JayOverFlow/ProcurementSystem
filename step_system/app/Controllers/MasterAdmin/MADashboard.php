<?php

namespace App\Controllers\MasterAdmin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MADashboard extends BaseController
{
    public function index()
    {
        return view('user-pages/master-admin/ma-dashboard');
    }
}
