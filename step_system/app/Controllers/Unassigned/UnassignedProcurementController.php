<?php

declare(strict_types=1);

namespace App\Controllers\Unassigned;

use App\Controllers\ProcurementPageController;
use CodeIgniter\HTTP\ResponseInterface;

class UnassignedProcurementController extends ProcurementPageController
{
    /**
     * Display the procurement tracking page for Faculty.
     *
     * @return ResponseInterface|string
     */
    public function index()
    {
        $userData = $this->loadUserSession();
        $userId = $userData['user_id'];

        $forms = $this->getUsersForms($userId);

        $data = [
            'user_data' => $userData,
            'forms' => $forms
        ];
        return view('user-pages/unassigned/unassigned-procurement', $data);
    }
} 