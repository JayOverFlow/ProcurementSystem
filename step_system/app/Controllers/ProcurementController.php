<?php

namespace App\Controllers;

use App\Controllers\ProcurementPageController;
use CodeIgniter\HTTP\ResponseInterface;

class ProcurementController extends ProcurementPageController
{
    public function index()
    {
        $userData = $this->loadUserSession();
        $userForms = $this->getUsersForms($userData['user_id']);

        // Dynamically generate filter options from the forms list
        $formTypesInTable = array_unique(array_column($userForms, 'form_type'));

        $filterOptions = ['ALL' => 'ALL'];
        foreach ($formTypesInTable as $formType) {
            if (!empty($formType)) {
                $filterOptions[$formType] = $formType;
            }
        }

        // Sort the options alphabetically, keeping ALL first
        $allOption = $filterOptions['ALL'];
        unset($filterOptions['ALL']);
        ksort($filterOptions);
        $filterOptions = ['ALL' => $allOption] + $filterOptions;

        $data = [
            'user_data' => $userData,
            'forms' => $userForms,
            'filter_options' => $filterOptions,
        ];

        switch ($userData['gen_role']) {
            case "Director":
                return view('user-pages/director/dir-procurement', $data);
                break;
            case "Assistant Director":
                return view('user-pages/assistant-director/ast-dir-procurement', $data);
                break;
            case "Head":
                return view('user-pages/head/head-procurement', $data);
                break;
            case "Planning Officer":
                return view('user-pages/planning/plan-procurement', $data);
                break;
            case "Supply":
                return view('user-pages/supply/sup-procurement', $data);
                break;
            case "Procurement":
                return view('user-pages/procurement/pro-procurement', $data);
                break;
            case "Faculty":
                return view('user-pages/faculty/fac-procurement', $data);
                break;
            case null:
                return view('user-pages/unassigned/unassigned-procurement', $data);
                break;
            default:
                // 404 page
                
        }
    }
}
