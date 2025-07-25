<?php

namespace App\Controllers\Unassigned;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MrItemModel;

// class UnassignedController extends BaseController
// {
//     public function mr()
//     {
//         // Get user data via user session using custom helper
//         $userData = $this->loadUserSession();

//         $mrItemModel = new MrItemModel();
//         $mrItems = $mrItemModel->getMrItemsByUserId($userData['user_id']);

//         // Store data
//         $data = [
//             'user_data' => $userData,
//             'mr_items' => $mrItems
//         ];

//         return view('user-pages/unassigned/unassigned-mr', $data);
//     }
//     public function ppmp()
//     {
//         // Get user data via user session using custom helper
//         $userData = $this->loadUserSession();

//         // Store data
//         $data = [
//             'user_data' => $userData
//         ];
//         return view('user-pages/unassigned/unassigned-ppmp', $data);
//     }
//     public function pr()
//     {
//         // Get user data via user session using custom helper
//         $userData = $this->loadUserSession();

//         // Store data
//         $data = [
//             'user_data' => $userData
//         ];
//         return view('user-pages/unassigned/unassigned-pr', $data);
//     }
// }
