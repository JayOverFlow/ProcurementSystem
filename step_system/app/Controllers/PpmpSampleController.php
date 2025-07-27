<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PpmpSampleController extends BaseController
{
    public function index()
    {
        return view('user-pages/planning/ppmp');
    }
}
