<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {

    protected $table = 'users_tbl';
    protected $primaryKey = 'user_id';

    protected $allowedFields = [
        'user_firstname',
        'user_middlename',
        'user_lastname',
        // 'user_fullname', // Virutal Generate ng MyQSL, so no need siya here
        'user_email',
        'user_password',
        'user_type',
        'user_suffix',
        'user_tupid'
    ];

    public function insertUser(array $data) {
        // Hash the password
        if (isset($data['user_password'])) {
            $data['user_password'] = password_hash($data['user_password'], PASSWORD_DEFAULT);
        }

        // Remove confirm_password from session data coz no need na siya
        unset($data['selected_department_id']);

        // Inserts data and returns true on success and false on failure
        $result = $this->insert($data, true);

        return $result;
    }

    // Authenticate user from login and retrieve their role and department information
    public function authenticateUser(string $user_email, string $user_password) {
        $user = $this->select('users_tbl.*, roles_tbl.role_name, roles_tbl.gen_role, departments_tbl.dep_name, departments_tbl.dep_id')
                     ->join('user_role_department_tbl', 'user_role_department_tbl.user_id = users_tbl.user_id AND user_role_department_tbl.role_id IS NOT NULL', 'left')
                     ->join('roles_tbl', 'roles_tbl.role_id = user_role_department_tbl.role_id', 'left')
                     ->join('departments_tbl', 'departments_tbl.dep_id = user_role_department_tbl.department_id', 'left')
                     ->where('users_tbl.user_email', $user_email)
                     ->first();

        if (!$user) {
            return false;
        }

        if (password_verify($user_password, $user['user_password'])) {
            unset($user['user_password']); // Remove for security
            log_message('debug', 'User data after authentication in UserModel: ' . print_r($user, true));
            return $user; // Return the query result with role and department info
        } else {
            return false;
        }
    }

    // Counts number of user (faculty or staff) for the Master Admin Dashboard
    public function countUsersByType(string $type)
    {
        return $this->where('user_type', $type)->countAllResults();
    }

    public function getAllFacultyCount()
    {
        return $this->where('user_type', 'Faculty')->countAllResults();
    }

    public function getAllStaffCount()
    {
        return $this->where('user_type', 'Staff')->countAllResults();
    }
}