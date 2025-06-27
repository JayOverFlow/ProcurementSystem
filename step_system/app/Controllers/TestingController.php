<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TestingController extends BaseController
{
    public function testing()
    {
        return view('user-pages/faculty/fac-dashboard-content');
    }
}
