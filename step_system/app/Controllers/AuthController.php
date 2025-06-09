<?php

namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController {

    public function index() {
        return view('register');
    }

    public function store() {
        
        $validation = \Config\Services::validation();
        $rules = [
            'user_password' => 'required|min_length[8]',
            'user_email' => 'required|valid_email|is_unique[users_tbl.user_email]',
            'user_type' => 'required|in_list[faculty, staff]'
        ];

        if (!$this->validate($rules)) {
            return view('register', 
                ['validation' => $this->validator]);
        }

        $userModel = new UserModel();
        $userModel->save([
            'user_firstname' => $this->request->getPost('user_firstname'),
            'user_middlename' => $this->request->getPost('user_middlename'),
            'user_lastname' => $this->request->getPost('user_lastname'),
            'user_email' => $this->request->getPost('user_email'),
            'user_password' => password_hash($this->request->getPost('user_password'), PASSWORD_DEFAULT),
            'user_type' => $this->request->getPost('user_type')
        ]);

        return redirect()->to('/login')->with('success', 'Registration successful. Please login.');

    }
}