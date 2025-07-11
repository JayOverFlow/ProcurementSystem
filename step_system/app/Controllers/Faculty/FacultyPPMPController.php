<?php

namespace App\Controllers\Faculty;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FacultyPPMPController extends BaseController
{
    public function index()
    {
        $userData = $this->loadUserSession();

        $data = [
            'user_data' => $userData
        ];

        return view('user-pages/faculty/fac-ppmp', $data);
    }
}
