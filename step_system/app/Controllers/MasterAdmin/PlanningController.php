<?php

namespace App\Controllers\MasterAdmin;

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
        return view('user-pages/planningy/fac-procurement');
    }

    public function tasks()
    {
        return view('user-pages/faculty/fac-tasks');
    }

    public function mr()
    {
        return view('user-pages/faculty/fac-mr');
    }

    public function ppmp()
    {
        return view('user-pages/faculty/fac-ppmp');
    }

    public function pr()
    {
        return view('user-pages/faculty/fac-pr');
    }
}
