<?php

namespace App\Controllers\Faculty;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DepartmentModel;
use App\Models\UserModel;

class FacultyPPMPController extends BaseController
{
    protected $departmentModel;
    protected $userModel;

    public function __construct() {
        $this->departmentModel = new DepartmentModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $userData = $this->loadUserSession();
        $departments = $this->departmentModel->getAllDepartments();
        $users = $this->userModel->getAllUsers();

        $data = [
            'user_data' => $userData,
            'departments' => $departments,
            'users' => $users
        ];

        return view('user-pages/faculty/fac-ppmp', $data);
    }
}
