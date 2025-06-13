<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;

class DepartmentHeadDashboard extends BaseController {

    public function index() {
        return view('user-pages/department-head/dh-dashboard');
    }

}
