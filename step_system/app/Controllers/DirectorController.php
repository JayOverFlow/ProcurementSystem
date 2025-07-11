<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DirectorController extends BaseController
{
    public function dashboard()
    {
        $userData = $this->loadUserSession();
        return view('user-pages/director/dir-dashboard', $userData);
    }
}
