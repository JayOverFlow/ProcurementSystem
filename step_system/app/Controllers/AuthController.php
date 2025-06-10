<?php

namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController {
    protected $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function register() {
        if ($this->request->is('post')) {
            $validation = \Config\Services::validation();

            $rules = [
                'user_firstname' => 'required|alpha_space|min_length[2]|max_length[80]',
                'user_middlename' => 'permit_empty|min_length[2]|max_length[50]',
                'user_lastname' => 'required|alpha_space|min_length[2]|max_length[50]',
                'user_suffix' => 'permit_empty|min_length[1]|max_length[15]',
                'user_password' => 'required|min_length[8]|max_length[70]',
                'confirm_password' => 'required|matches[user_password]',
                'user_email' => 'required|valid_email|is_unique[users_tbl.user_email]',
                'user_type' => 'required|in_list[Faculty, Staff]'
            ];
    
            if (!$this->validate($rules)) {
                return view('auth/register', 
                    ['validation' => $this->validator]);
            }

            $userModel = new UserModel();
            $userModel->insert([
                'user_firstname' => $this->request->getPost('user_firstname'),
                'user_middlename' => $this->request->getPost('user_middlename'),
                'user_lastname' => $this->request->getPost('user_lastname'),
                'user_suffix' => $this->request->getPost('user_suffix'),
                'user_email' => $this->request->getPost('user_email'),
                'user_password' => password_hash($this->request->getPost('user_password'), PASSWORD_DEFAULT),
                'user_type' => $this->request->getPost('user_type')
            ]);
            
            return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
        } else {
            return view('auth/register');
        }
    }

    public function login() {
        if ($this->request->is('post')) {
            $validation = \Config\Services::validation();

            $rules = [
                'user_email' => 'required|valid_email',
                'user_password' => 'required',
            ];

            if (!$this->validate($rules)) {
                return view('auth/login', [
                    'validation' => $this->validator
                ]);
            }

            $user_email = $this->request->getPost('user_email');
            $user_password = $this->request->getPost('user_password');

            $session = \Config\Services::session();

            $user = $this->userModel->where('user_email', $user_email)->first();
            
            if ($user && password_verify($user_password, $user['user_password'])) {
                $session->set([
                    'user_id' => $user['user_id'],
                    'user_fullname' => $user['user_fullname'],
                    'user_firstname' => $user['user_firstname'],
                    'user_middlename' => $user['user_middlename'],
                    'user_lastname' => $user['user_lastname'],
                    'user_suffix' => $user['user_suffix'],
                    'user_email' => $user['user_email'],
                    'user_type' => $user['user_type'],
                    'user_role_fk' => $user['user_role_fk'],
                    'user_dep_fk' => $user['user_dep_fk'],
                    'isLoggedIn' => true
                ]);

                return redirect()->to('/landing')->with('success', 'Login successful!');
            } else {
                return redirect()->to('/login')->with('error', 'Invalid email or password');
            }
        } else {
            return view('auth/login');
        }
    }
}