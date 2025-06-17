<?php

namespace App\Controllers\DepartmentHead;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DHDashboard extends BaseController {

    public function index() {
        return view('user-pages/department-head/dh-dashboard');
    }

}
