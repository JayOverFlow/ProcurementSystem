<?php

namespace App\Controllers\DepartmentHead;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DHDashboard extends BaseController {

    public function index() {
        $userData = $this->loadUserSession();
        return view('user-pages/department-head/dh-dashboard', $userData);    
    }

}
