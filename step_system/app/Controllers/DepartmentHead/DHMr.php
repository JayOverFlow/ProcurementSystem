<?php

namespace App\Controllers\DepartmentHead;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DHMr extends BaseController {

    public function index() {
        return view('user-pages/head/head-mr');
    }

}
