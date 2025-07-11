<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UnassignedController extends BaseController
{
    public function mr()
    {
        return view('user-pages/unassigned/unassigned-mr');
    }
    public function ppmp()
    {
        return view('user-pages/unassigned/unassigned-ppmp');
    }
    public function pr()
    {
        return view('user-pages/unassigned/unassigned-pr');
    }
}
