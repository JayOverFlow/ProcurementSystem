<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\DepartmentModel;
use App\Models\OtpModel;
use App\Models\UserRoleDepartmentModel;
use App\Models\AdminModel;
use App\Models\MasterKeyModel;

class AuthController extends BaseController {
    protected $userModel;
    protected $departmentModel;
    protected $otpModel;
    protected $userRoleDepartmentModel;
    protected $adminModel;
    protected $masterKeyModel;
    protected $validation;
    protected $session;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->departmentModel = new DepartmentModel();
        $this->otpModel = new OtpModel();
        $this->userRoleDepartmentModel = new UserRoleDepartmentModel();
        $this->adminModel = new AdminModel();
        $this->masterKeyModel = new MasterKeyModel();
        $this->validation = service('validation');
        $this->session = service('session');
        helper(['form', 'url']);
    }

    // Generate a random 6-digits OTP, saves to database and to user's email
    // param: string email from user
    // return: bool ture if the OTP has been sent successfuly or false if unsuccessful
    private function _generateAndSendOtp(string $email): bool {
        // Generate a 6-digit OTP
        $otpCode = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Save OTP to the database that expires in 5 mins
        $this->otpModel->saveOtp($email, $otpCode, 5);

        // Prepare an email to send
        $emailService = service('email');
        $emailService->setFrom('no-reply@tupstep.com', 'TUP STEP');
        $emailService->setTo($email);
        $emailService->setSubject('Your OTP for Registration');
        $emailService->setMessage("Your One-Time Password (OTP) for TUP STEP registration is: <b>$otpCode</b>. It will expire in 5 minutes.");
        
        // Send an email with logs
        // If sent successful
        if ($emailService->send()) {
            log_message('info', 'OTP email sent successfully to: ' . $email);
            return true;
        } else {
            log_message('error', 'Failed to send OTP email to: ' . $email . '. Error: ' . $emailService->printDebugger(['headers', 'subject', 'body']));
            return false;
        }
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
                'user_tupid' => $this->request->getPost('user_tupid'),
                'user_email' => $this->request->getPost('user_email'),
                'user_password' => $this->request->getPost('user_password'),
                'confirm_password' => $this->request->getPost('confirm_password'),
                'user_type' => $this->request->getPost('user_type'),
                'selected_department_id' => $this->request->getPost('selected_department_id')
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
                'user_tupid' => [
                    'rules' => 'required|exact_length[6]|is_unique[users_tbl.user_tupid]',
                    'errors' => [
                        'required' => 'TUP ID is required',
                        'exact_length' => 'TUP ID must be exactly 6 characters',
                        'is_unique' => 'This TUP ID is already registered'
                    ]
                ],
                'user_email' => [
                    'rules' => 'required|regex_match[/^[a-zA-Z0-9._%+-]+@tup\.edu\.ph$/]|is_unique[users_tbl.user_email]',
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
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Validation failed. Please check your inputs.',
                    'validation' => $this->validator->getErrors()
                ]);
            }

            // Validation passed, store data in session for later use after OTP verification
            // At this point the validation passed
            unset($data['confirm_password']); // Remove confirm_password from session data coz no need na siya
            log_message('debug', 'Data before session storage: ' . print_r($data, true));
            $this->session->set('registration_data', $data); // Set a temporary session to use email for OTP
            $this->session->setFlashdata('message', 'OTP will be sent to your email for verification.');

            // Return a success response (e.g., JSON) to the AJAX call
            // The frontend JavaScript will handle showing the modal and advancing the stepper
            return $this->response->setJSON(['status' => 'success', 'message' => 'Validation successful. Proceed to OTP verification.']);

        } else {
            // For GET request, initialize empty data and clear previous registration data from session
            $this->session->remove('registration_data');
            $data = [
                'user_firstname' => '',
                'user_middlename' => '',
                'user_lastname' => '',
                'user_suffix' => '',
                'user_tupid' => '',
                'user_email' => '',
                'user_password' => '',
                'confirm_password' => '',
                'user_type' => ''
            ];
            
            // Fetch and append departments to be listed in dropdown options
            $data['departments'] = $this->departmentModel->getAllDepartments();
            
            return view('auth/register', $data);
        }
    }

    // Check if TUP ID is already in use by frontend via AJAX request
    public function checkTupId()
    {
        if ($this->request->isAJAX()) {
            $tupid = $this->request->getPost('user_tupid');

            // Define validation rules for TUP ID
            $rules = [
                'user_tupid' => [
                    'rules' => 'required|exact_length[6]|is_unique[users_tbl.user_tupid]',
                    'errors' => [
                        'required' => 'TUP ID is required',
                        'exact_length' => 'TUP ID must be exactly 6 characters',
                        'is_unique' => 'This TUP ID is already registered'
                    ]
                ],
            ];

            // Validate the TUP ID
            if (!$this->validate($rules)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'validation' => $this->validator->getErrors()
                ]);
            }

            // If validation passes, it means the TUP ID is unique
            return $this->response->setJSON(['status' => 'success', 'message' => 'TUP-T ID is unique.']);
        }

        return $this->response->setStatusCode(405)->setJSON(['status' => 'error', 'message' => 'Method Not Allowed']);
    }

    public function checkEmail()
    {
        if ($this->request->isAJAX()) {
            $tupid = $this->request->getPost('user_email');

            // Define validation rules for TUP ID
            $rules = [
                'user_email' => [
                    'rules' => 'required|regex_match[/^[a-zA-Z0-9._%+-]+@tup\.edu\.ph$/]|is_unique[users_tbl.user_email]',
                    'errors' => [
                        'required' => 'Email address is required',
                        'regex_match' => 'Please use a valid TUP email address (@tup.edu.ph)',
                        'is_unique' => 'This email address is already registered'
                    ]
                ],
                
            ];

            // Validate the TUP ID
            if (!$this->validate($rules)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'validation' => $this->validator->getErrors()
                ]);
            }

            // If validation passes, it means the TUP ID is unique
            return $this->response->setJSON(['status' => 'success', 'message' => 'TUP-T ID is unique.']);
        }

        return $this->response->setStatusCode(405)->setJSON(['status' => 'error', 'message' => 'Method Not Allowed']);
    }

    // Send OTP via AJAX request from frontend
    public function sendOtp() {
        if ($this->request->isAJAX()) {
            $registrationData = $this->session->get('registration_data');

            if ($registrationData && isset($registrationData['user_email'])) {
                $email = $registrationData['user_email'];

                if ($this->_generateAndSendOtp($email)) {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'OTP sent to your email.']);
                } else {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to send OTP. Please try again.']);
                }
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Registration data not found in session.']);
            }
        }
        return $this->response->setStatusCode(405)->setJSON(['status' => 'error', 'message' => 'Method Not Allowed']);
    }

    // Verify the user's OTP code it submits from frotend via AJAX request
    public function verifyOtp() {
        if ($this->request->isAJAX()) {
            $otp = $this->request->getPost('otp');
            $registrationData = $this->session->get('registration_data');

            log_message('debug', 'Registration data after session retrieval: ' . print_r($registrationData, true));

            if (!$registrationData || !isset($registrationData['user_email'])) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Registration data expired or not found. Please restart registration.']);
            }

            $email = $registrationData['user_email'];
            $storedOtp = $this->otpModel->getOtpByEmail($email); // Get the OTP code by user email

            if (!$storedOtp) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'OTP not found or expired. Please resend OTP.']);
            }

            // Check if OTP is expired
            if (strtotime($storedOtp['expires_at']) < time()) {
                $this->otpModel->deleteOtpByEmail($email); // Clean up expired OTP
                return $this->response->setJSON(['status' => 'error', 'message' => 'OTP has expired. Please resend OTP.']);
            }

            // Verify OTP
            if ($otp === $storedOtp['otp_code']) {
                // OTP is valid, proceed with user registration
                $db = \Config\Database::connect();
                $db->transBegin(); // Start transaction

                try {
                    $userId = $this->userModel->insertUser($registrationData);

                    if ($userId) {
                        // Get dep_id from registrationData
                        $depId = $registrationData['selected_department_id'];

                        // Insert into user_role_department_tbl
                        $userRoleDeptResult = $this->userRoleDepartmentModel->insertUserRoleDepartment($userId, $depId);

                        if ($userRoleDeptResult) {
                            $db->transCommit(); // Commit transaction if both insertions are successful
                            $this->otpModel->deleteOtpByEmail($email);
                            $this->session->remove('registration_data');
                            return $this->response->setJSON(['status' => 'success', 'message' => 'Registration successful!']);
                        } else {
                            $db->transRollback(); // Rollback if user role department insertion fails
                            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to link user with department. Please try again.']);
                        }
                    } else {
                        $db->transRollback(); // Rollback if user insertion fails
                        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to complete registration. Please try again.']);
                    }
                } catch (\Exception $e) {
                    $db->transRollback(); // Rollback on any exception
                    log_message('error', 'Registration transaction failed: ' . $e->getMessage() . '\nStack Trace: ' . $e->getTraceAsString());
                    return $this->response->setJSON(['status' => 'error', 'message' => 'An unexpected error occurred during registration. Please try again.']);
                }
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid OTP. Please try again.']);
            }
        }
        return $this->response->setStatusCode(405)->setJSON(['status' => 'error', 'message' => 'Method Not Allowed']);
    }

    // Resend a new OTP code via AJAX req from frontend
    public function resendOtp()
    {
        if ($this->request->isAJAX()) {
            $registrationData = $this->session->get('registration_data');

            if ($registrationData && isset($registrationData['user_email'])) {
                $email = $registrationData['user_email'];

                if ($this->_generateAndSendOtp($email)) {
                    return $this->response->setJSON(['status' => 'success', 'message' => 'New OTP sent to your email.']);
                } else {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to resend OTP. Please try again.']);
                }
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Registration data not found in session. Cannot resend OTP.']);
            }
        }
        return $this->response->setStatusCode(405)->setJSON(['status' => 'error', 'message' => 'Method Not Allowed']);
    }

    public function login() {
        // If the request is POST
        if ($this->request->is('post')) {
            // Get user inputs
            $data = [
                'user_email' => $this->request->getPost('user_email'),
                'user_password' => $this->request->getPost('user_password')
            ];

            // Define rules
            $rules = [
                'user_email' => [
                    'rules' => 'required|regex_match[/^[a-zA-Z0-9._%+-]+@tup\.edu\.ph$/]',
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
            
            // Validate
            if (!$this->validate($rules)){
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Fill out the fields to login. Duh!',
                'validation' => $this->validator->getErrors()
            ]);
            }
            
            // Query to database through UserModel
            $user = $this->userModel->authenticateUser($data['user_email'], $data['user_password']);

            // If a user found in database
            if ($user) {
                // Set user data in session
                $this->session->set([
                    'user_id' => $user['user_id'] ?? null,
                    'user_firstname' => $user['user_firstname'] ?? null,
                    'user_middlename' => $user['user_middlename'] ?? null,
                    'user_lastname' => $user['user_lastname'] ?? null,
                    'user_fullname' => $user['user_fullname'] ?? null,
                    'user_email' => $user['user_email'] ?? null,
                    'user_type' => $user['user_type'] ?? null,
                    'user_suffix' => $user['user_suffix'] ?? null,
                    'user_tupid' => $user['user_tupid'] ?? null,
                    'user_role_name' => $user['role_name'] ?? null,
                    'user_gen_role' => $user['gen_role'] ?? null,
                    'user_dep_name' => $user['dep_name'] ?? null,
                    'user_dep_id' => $user['dep_id'] ?? null,
                    'user_role_id' => $user['role_id'] ?? null,
                    'isLoggedIn' => true
                ]);

                // Determine redirect URL based on gen_role
                $redirectUrl = match ($user['gen_role']) {
                    'Director' => base_url('/dashboard'),
                    'Head' => base_url('/dashboard'),
                    'Planning Officer' => base_url('/dashboard'),
                    'Procurement' => base_url('/dashboard'),
                    'Supply' => base_url('/dashboard'),
                    'Faculty' => base_url('/dashboard'),
                    'Assistant Director' => base_url('/dashboard'),
                    null => base_url('/dashboard'),

                    default => base_url('/login') // Default fallback if gen_role is not matched
                };

                // Return success message and a redirect URL
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Login successful!',
                    'redirect' => $redirectUrl
                ]);
            } else {
                // Return error message if authentication fails
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Invalid email or password.'
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

    public function adminLogin() {
        if ($this->request->is('post')) {
            $requestData = $this->request->getJSON(true); // Get JSON data as associative array

            $data = [
                'admin_username' => $requestData['admin_username'] ?? null,
                'admin_password' => $requestData['admin_password'] ?? null
            ];

            // Define rules for admin login validation (add these rules)
            $rules = [
                'admin_username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username is required. Duh!'
                    ]
                ],
                'admin_password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password is required. Duh!'
                    ]
                ]
            ];

            if (!$this->validate($rules)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Fill out the fields to login. Duh!',
                    'validation' => $this->validator->getErrors()
                ]);
            }

            // Authenticate admin user
            $admin = $this->adminModel->authenticateAdmin($data['admin_username'], $data['admin_password']);

            if ($admin) {
                // Set admin data in session
                $this->session->set([
                    'admin_id' => $admin['admin_id'] ?? null,
                    'admin_username' => $admin['admin_username'] ?? null,
                    'isAdminLoggedIn' => true
                ]);

                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Admin Login successful!',
                    'redirect' => base_url('/admin/dashboard')
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Invalid username or password.'
                ]);
            }
        } else {
            $data = [
                'admin_username' => '',
                'admin_password' => '',
            ];
            return view('auth/admin_login', ['data' => $data]);
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }

    public function adminLogout()
    {
        $this->session->remove('admin_id');
        $this->session->remove('admin_username');
        $this->session->remove('isAdminLoggedIn');
        $this->session->destroy();
        return redirect()->to('/admin/login');
    }

    public function adminRegister() {
        if ($this->request->is('post')) {
            $requestData = $this->request->getJSON(true); // Get JSON data as associative array

            $data = [
                'admin_username' => $requestData['admin_username'] ?? null,
                'admin_password' => $requestData['admin_password'] ?? null,
                'confirm_password' => $requestData['confirm_password'] ?? null,
                'master_key' => $requestData['master_key'] ?? null,
            ];

            $rules = [
                'admin_username' => [
                    'rules' => 'required|min_length[5]|max_length[100]|is_unique[admins_tbl.admin_username]',
                    'errors' => [
                        'required' => 'Username is required.',
                        'min_length' => 'Username must be at least 5 characters long.',
                        'max_length' => 'Username cannot exceed 100 characters.',
                        'is_unique' => 'This username is already taken.'
                    ]
                ],
                'admin_password' => [
                    'rules' => 'required|min_length[8]|max_length[70]',
                    'errors' => [
                        'required' => 'Password is required.',
                        'min_length' => 'Password must be at least 8 characters long.',
                        'max_length' => 'Password cannot exceed 70 characters.'
                    ]
                ],
                'confirm_password' => [
                    'rules' => 'required|matches[admin_password]',
                    'errors' => [
                        'required' => 'Please confirm your password.',
                        'matches' => 'Passwords do not match.'
                    ]
                ],
                'master_key' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Master Key is required.'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Validation failed. Please check your inputs.',
                    'validation' => $this->validator->getErrors()
                ]);
            }

            // Validate Master Key
            $masterKey = $this->masterKeyModel->getMasterKey($data['master_key']);
            if (!$masterKey || $masterKey['master_key_is_used'] == 1) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Invalid or already used Master Key.'
                ]);
            }

            // Register admin and mark master key as used within a transaction
            $db = \Config\Database::connect();
            $db->transBegin();

            try {
                $adminData = [
                    'admin_username' => $data['admin_username'],
                    'admin_password' => $data['admin_password'],
                    'admin_key' => $masterKey['master_key_id'],
                ];

                if ($this->adminModel->insertAdmin($adminData)) {
                    $this->masterKeyModel->markKeyAsUsed($masterKey['master_key_id']);
                    $db->transCommit();

                    // Set flashdata message for the next request (admin login page)
                    session()->setFlashdata('success', 'Admin registration successful! You can now login.');
                    return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Admin registration successful! Redirecting...',
                        'redirect' => base_url('/admin/login') // Tell frontend to redirect
                    ]);
                } else {
                    $db->transRollback();
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Failed to register admin. Please try again.'
                    ]);
                }
            } catch (\Exception $e) {
                $db->transRollback();
                log_message('error', 'Admin registration transaction failed: ' . $e->getMessage());
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'An unexpected error occurred during registration. Please try again.'
                ]);
            }

        } else {
            $data = [
                'admin_username' => '',
                'admin_password' => '',
                'confirm_password' => '',
                'master_key' => '',
            ];
            return view('auth/admin_register', ['data' => $data]);
        }
    }
}