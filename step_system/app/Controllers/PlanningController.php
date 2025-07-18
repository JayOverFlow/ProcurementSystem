<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PlanningController extends BaseController
{
    public function dashboard()
    {
        // We should return page with user data from database
        return view('user-pages/planning/plan-dashboard');
    }

    public function procurement()
    {
        return view('user-pages/planning/plan-procurement');
    }

    public function tasks()
    {
        return view('user-pages/planning/plan-tasks');
    }

    public function mr()
    {
        return view('user-pages/planning/plan-mr');
    }

    public function ppmp()
    {
        return view('user-pages/planning/plan-ppmp');
    }

    public function pr()
    {
        return view('user-pages/planning/plan-pr');
    }

    public function app()
    {
        return view('user-pages/planning/plan-app');
    }
    public function inventory()
    {
        return view('user-pages/planning/plan-inventory');
    }
    public function file1()
    {
        return view('user-pages/planning/ppmp');
    }
    public function file2()
    {
        return view('user-pages/planning/po');
    }
}
