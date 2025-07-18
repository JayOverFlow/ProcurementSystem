<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MrItemModel;


class MrController extends BaseController
{
    protected $MrItemModel;
     
    public function __construct() {
        $this->mrItemModel = new MrItemModel();
    }

    public function index()
    {
        $userData = $this->loadUserSession();
        $mrItems = $this->mrItemModel->getMrItemsByUserId($userData['user_id']);

        $data = [
            'user_data' => $userData,
            'mr_items' => $mrItems
        ];

        $role = $userData['gen_role'] ?? null;

        switch ($role) {
            case 'Director':
                return view('user-pages/director/dir-mr', $data);
            case 'Planning Officer':
                return view('user-pages/planning/plan-mr', $data);
            case 'Head':
                return view('user-pages/department-head/dh-mr', $data);
            case 'Faculty': // = Section Head
                return view('user-pages/faculty/fac-mr', $data);
            case 'Procurement':
                return view('user-pages/procurement/pro-mr', $data);
            case 'Supply':
                return view('user-pages/supply/sup-mr', $data);
            default:
                return view('user-pages/unassigned/unassigned-mr', $data);
        }
    }

} 