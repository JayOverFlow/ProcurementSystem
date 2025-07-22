<?php

declare(strict_types=1);

namespace App\Controllers\Unassigned;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UnassignedProcurementController extends BaseController
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
        return view('user-pages/unassigned/unassigned-procurement', $data);
    }
} 