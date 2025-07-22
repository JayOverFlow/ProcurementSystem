<?php

declare(strict_types=1);

namespace App\Controllers\Director;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DirectorProcurementController extends BaseController
{
    /**
     * Display the procurement tracking page for Director.
     *
     * @return ResponseInterface|string
     */
    public function index()
    {
        $userData = $this->loadUserSession();
        $data = [
            'user_data' => $userData
        ];
        return view('user-pages/director/dir-procurement', $data);
    }
} 