<?php


namespace App\Controllers\Api;

// No change to use statements
use App\Models\OtpModel;
use App\Models\UserRoleDepartmentModel;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json';
    protected $otpModel;
    protected $userRoleDepartmentModel;

    public function __construct()
    {
        $this->otpModel = new \App\Models\OtpModel();
        $this->userRoleDepartmentModel = new \App\Models\UserRoleDepartmentModel();
    }


    /**
     * Handle user login.
     * POST /api/user/login
     */
    public function login()
    {
        $rules = [
            'user_email' => 'required|regex_match[/^[a-zA-Z0-9._%+-]+@tup\.edu\.ph$/]',
            'user_password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $email = $this->request->getVar('user_email');
        $password = $this->request->getVar('user_password');

        $user = $this->model->authenticateUser($email, $password);

        if ($user) {
            unset($user['password']);
            return $this->respond($user, 200, 'Login successful!');
        } else {
            return $this->fail('Invalid email or password.', 401);
        }
    }

    /**
     * Step 1 of Registration: Validate data and send OTP.
     * POST /api/user/register
     */
    public function register()
    {
        $rules = [
            'user_firstname' => 'required|alpha_space|max_length[80]',
            'user_middlename' => 'required|max_length[50]',
            'user_lastname' => 'required|max_length[50]',
            'user_suffix' => 'permit_empty|max_length[15]',
            'user_tupid' => 'required|exact_length[6]|is_unique[users_tbl.user_tupid]',
            'user_email' => 'required|regex_match[/^[a-zA-Z0-9._%+-]+@tup\.edu\.ph$/]|is_unique[users_tbl.user_email]',
            'user_password' => 'required|min_length[8]|max_length[70]',
            'user_type' => 'required|in_list[Faculty,Staff]',
            'selected_department_id' => 'required|integer',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $email = $this->request->getVar('user_email');

        if ($this->_generateAndSendOtp($email)) {
            return $this->respond(['status' => 'success', 'message' => 'OTP sent to your email.'], 200);
        } else {
            return $this->fail('Failed to send OTP. Please try again.');
        }
    }

    /**
     * Step 2 of Registration: Verify OTP and create user.
     * POST /api/user/verify
     */
    public function verify()
    {
        $rules = [
            'otp' => 'required|exact_length[6]',
            'user_email' => 'required|valid_email',
            'user_firstname' => 'required',
            'user_lastname' => 'required',
            'user_tupid' => 'required',
            'user_password' => 'required',
            'selected_department_id' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $email = $this->request->getVar('user_email');
        $otp = $this->request->getVar('otp');

        $storedOtp = $this->otpModel->getOtpByEmail($email);

        if (!$storedOtp || strtotime($storedOtp['expires_at']) < time() || $otp !== $storedOtp['otp_code']) {
            return $this->fail('Invalid or expired OTP.', 400);
        }

        $db = \Config\Database::connect();
        $db->transBegin();

        try {
            $registrationData = $this->request->getPost();
            unset($registrationData['otp']);
            $registrationData['user_password'] = password_hash($registrationData['user_password'], PASSWORD_DEFAULT);
            $userId = $this->model->insert($registrationData);

            if ($userId === false) {
                $db->transRollback();
                return $this->fail($this->model->errors());
            }

            $depId = $registrationData['selected_department_id'];
            $userRoleDeptResult = $this->userRoleDepartmentModel->insertUserRoleDepartment($userId, $depId);

            if ($userRoleDeptResult) {
                $db->transCommit();
                $this->otpModel->deleteOtpByEmail($email);
                $newUser = $this->model->find($userId);
                unset($newUser['password']);
                return $this->respondCreated($newUser, 'Registration successful!');
            } else {
                $db->transRollback();
                return $this->fail('Failed to link user with department.');
            }
        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', 'API Registration transaction failed: ' . $e->getMessage());
            return $this->fail('An unexpected error occurred during registration.');
        }
    }
    
    private function _generateAndSendOtp(string $email): bool {
        $otpCode = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $this->otpModel->saveOtp($email, $otpCode, 5);

        $emailService = service('email');
        $emailService->setFrom('no-reply@tupstep.com', 'TUP STEP');
        $emailService->setTo($email);
        $emailService->setSubject('Your OTP for Registration');
        $emailService->setMessage("Your One-Time Password (OTP) for TUP STEP registration is: <b>$otpCode</b>. It will expire in 5 minutes.");
        
        if ($emailService->send()) {
            log_message('info', 'OTP email sent successfully to: ' . $email);
            return true;
        } else {
            log_message('error', 'Failed to send OTP email to: ' . $email . '. Error: ' . $emailService->printDebugger(['headers', 'subject', 'body']));
            return false;
        }
    }
}