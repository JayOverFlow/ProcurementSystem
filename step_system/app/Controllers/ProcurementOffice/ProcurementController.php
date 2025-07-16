<?php

namespace App\Controllers\ProcurementOffice;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProcurementController extends BaseController
{
    public function dashboard()
    {
        return view('user-pages/procurement/pro-dashboard');
    }


    public function tasks()
    {
        return view('user-pages/procurement/pro-tasks');
    }

    public function mr()
    {
        return view('user-pages/procurement/pro-mr') ;
    }

    public function ppmp()
    {
        return view('user-pages/procurement/pro-ppmp');
    }

    public function pr()
    {
        return view('user-pages/procurement/pro-pr');
    }
    public function po()
    {
        return view('user-pages/procurement/pro-po');
    }
    public function inventory()
    {
        return view('user-pages/procurement/pro-inventory');
    }

}

