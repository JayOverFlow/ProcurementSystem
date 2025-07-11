<?php

namespace App\Controllers\DepartmentHead;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DHDashboard extends BaseController {

    public function index()
    {
        // We should return page with user data from database
        return view('user-pages/head/head-dashboard');
    }


    public function tasks()
    {
        return view('user-pages/head/head-tasks');
    }

    public function mr()
    {
        return view('user-pages/head/head-mr') ;
    }

    public function ppmp()
    {
        return view('user-pages/head/head-ppmp');
    }

    public function pr()
    {
        return view('user-pages/head/head-pr');
    }
    public function app()
    {
        return view('user-pages/head/head-app');
    }

}
