<?php

declare(strict_types=1);

namespace App\Controllers\Faculty;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FacultyProcurementController extends BaseController
{
    /**
     * Display the procurement tracking page for Faculty.
     *
     * @return ResponseInterface|string
     */
    public function index()
    {
        $userData = $this->loadUserSession();
        $data = [
            'user_data' => $userData
        ];
        return view('user-pages/faculty/fac-procurement', $data);
    }
} 