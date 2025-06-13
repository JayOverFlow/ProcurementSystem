<?php

namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController {
    protected $userModel;
    protected $validation;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->validation = service('validation');
        helper(['form', 'url']);
    }

    public function register() {
        // If the request is post
        if ($this->request->is('post')) {

            // Get user data
            $data = [
                'user_firstname' => $this->request->getPost('user_firstname'),
                'user_middlename' => $this->request->getPost('user_middlename'),
                'user_lastname' => $this->request->getPost('user_lastname'),
                'user_suffix' => $this->request->getPost('user_suffix'),
                'user_tupt_id' => $this->request->getPost('user_tupt_id'),
                'user_email' => $this->request->getPost('user_email'),
                'user_password' => $this->request->getPost('user_password'),
                'confirm_password' => $this->request->getPost('confirm_password'),
                'user_type' => $this->request->getPost('user_type'),
            ];

            // Define validtion rules
            $rules = [
                'user_firstname' => [
                    'rules' => 'required|alpha_space|max_length[80]',
                    'errors' => [
                        'required' => 'First name is required',
                        'max_length' => 'First name cannot exceed 10 characters'
                    ]
                ],
                'user_middlename' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required' => 'Middle name is required',
                        'max_length' => 'Middle name cannot exceed 50 characters'
                    ]
                ],
                'user_lastname' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required' => 'Last name is required',
                        'max_length' => 'Last name cannot exceed 50 characters'
                    ]
                ],
                'user_suffix' => [
                    'rules' => 'permit_empty|max_length[15]',
                    'errors' => [
                        'max_length' => 'Suffix cannot exceed 15 characters'
                    ]
                ],
                'user_tupt_id' => [
                    'rules' => 'required|exact_length[6]|is_unique[users_tbl.user_tupt_id]',
                    'errors' => [
                        'required' => 'TUP-T ID is required',
                        'exact_length' => 'TUP-T ID must be exactly 6 characters',
                        'is_unique' => 'This TUP-T ID is already registered'
                    ]
                ],
                'user_email' => [
                    'rules' => 'required|regex_match[^[a-zA-Z0-9._%+-]+@tup\.edu\.ph$]|is_unique[users_tbl.user_email]',
                    'errors' => [
                        'required' => 'Email address is required',
                        'regex_match' => 'Please use a valid TUP email address (@tup.edu.ph)',
                        'is_unique' => 'This email address is already registered'
                    ]
                ],
                'user_password' => [
                    'rules' => 'required|min_length[8]|max_length[70]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'Password must be at least 8 characters long',
                        'max_length' => 'Password cannot exceed 70 characters'
                    ]
                ],
                'confirm_password' => [
                    'rules' => 'required|matches[user_password]',
                    'errors' => [
                        'required' => 'Please confirm your password',
                        'matches' => 'Passwords do not match'
                    ]
                ],
                'user_type' => [
                    'rules' => 'required|in_list[Faculty, Staff]',
                    'errors' => [
                        'required' => 'User type is required',
                        'in_list' => 'Please select either Faculty or Staff'
                    ]
                ]
            ];

            if (!$this->validate($rules)) {
                return view('auth/register', [
                    'validation' => $this->validator,
                    'data' => $data
                ]);
            }

            // Remove confirm_password as it's not needed in database
            unset($data['confirm_password']);

            $result = $this->userModel->insertUser($data);

            if ($result) {
                return redirect()->to('/login')->with('success', 'Registration successful! Please login.');
            } else {
                return view('auth/register', [
                    'error' => 'Failed to register. Please try again.',
                    'data' => $data
                ]);
            }

        } else {
            // For GET request, initialize empty data
        $data = [
            'user_firstname' => '',
            'user_middlename' => '',
            'user_lastname' => '',
            'user_suffix' => '',
            'user_email' => '',
            'user_password' => '',
            'confirm_password' => '',
            'user_type' => ''
        ];
        
        return view('auth/register', ['data' => $data]);
        }
        
        
    }

    public function login() {
        if ($this->request->is('post')) {
            $data = [
                'user_email' => $this->request->getPost('user_email'),
                'user_password' => $this->request->getPost('user_password')
            ];

            $rules = [
                'user_email' => [
                    'rules' => 'required|regex_match[^[a-zA-Z0-9._%+-]+@tup\.edu\.ph$]',
                    'errors' => [
                        'required' => 'Email is required',
                        'regex_match' => 'Please login with valid TUP email address'
                    ],
                ],
                'user_password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password is required. Duh?'
                    ]
                ]
            ];
            
            if (!$this->validate($rules)){
                return view('auth/login', [
                    'validation' => $this->validator,
                    'data' => $data
                ]);
            }

            $user = $this->userModel->authenticateUser($data);

            if ($user) {
                $session = service('session');
                $session->set([
                    'user_id' => $user['user_id'],
                    // 'user_firstname' => $user['user_firstname'],
                    // 'user_middlename' => $user['user_middlename'],
                    // 'user_lastname' => $user['user_lastname'],
                    // 'user_suffix' => $user['user_suffix'],
                    // // 'user_tupt_id' => $user['user_tupt_id'],
                    // 'user_email' => $user['user_email'],
                    // 'user_type' => $user['user_type'],
                    // 'user_role_fk' => $user['user_role_fk'],
                    // 'user_dep_fk' => $user['user_dep_fk'],
                    'isLoggedIn' => true
                ]);

                // return redirect()->to('/landing');
                return view('landing');
            } else {
                return view('auth/login', [
                    'error' => 'Invalid email or password',
                    'data' => $data
                ]);
            }
        } else {
            $data = [
                'user_email' => '',
                'user_password' => '',
            ];
            return view('auth/login', ['data' => $data]);
        }
    }
}