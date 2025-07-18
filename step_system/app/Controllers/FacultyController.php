<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FacultyController extends BaseController
{
    public function dashboard()
    {
        $userData = $this->loadUserSession();
        return view('user-pages/faculty/fac-dashboard', $userData);
    }

    public function procurement()
    {
        return view('user-pages/faculty/fac-procurement');
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
