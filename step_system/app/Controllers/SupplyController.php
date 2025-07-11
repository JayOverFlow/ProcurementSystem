<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SupplyController extends BaseController
{
    public function dashboard()
    {
        // We should return page with user data from database
        return view('user-pages/supply/sup-dashboard');
    }

    public function procurement()
    {
        return view('user-pages/supply/sup-procurement');
    }

    public function tasks()
    {
        return view('user-pages/supply/sup-tasks');
    }

    public function mr()
    {
        return view('user-pages/supply/sup-mr');
    }

    public function ppmp()
    {
        return view('user-pages/supply/sup-ppmp');
    }

    public function par()
    {
        return view('user-pages/supply/sup-par');
    }

    public function ics()
    {
        return view('user-pages/supply/sup-ics');
    }

    public function su()
    {
        return view('user-pages/supply/su');
    }
}
