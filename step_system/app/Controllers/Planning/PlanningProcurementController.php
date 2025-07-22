<?php

declare(strict_types=1);

namespace App\Controllers\Planning;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PlanningProcurementController extends BaseController
{
    /**
     * Display the procurement tracking page for Planning Officer.
     *
     * @return ResponseInterface|string
     */
    public function index()
    {
        $userData = $this->loadUserSession();
        $data = [
            'user_data' => $userData
        ];
        return view('user-pages/planning/plan-procurement', $data);
    }
} 