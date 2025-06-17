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

        // Inserts data and returns true on success and false on failure
        $result = $this->insert($data, false);

        return $result;
    }

    // Authenticate user from login
    public function authenticateUser(string $user_email, string $user_password) {
        // Quesy to database to find the email
        $user = $this->where('user_email', $user_email)->first();

        // If email dont exist
        if (!$user) {
            return false;
        }

        // If password is correct
        if(password_verify($user_password, $user['user_password'])) {
            unset($user['user_password']); // Remove for security
            return $user; // Return the query result
        } else {
            return false;
        }
    }

    // Counts number of user (faculty or staff) for the Master Admin Dashboard
    public function countUsersByType(string $type)
    {
        return $this->where('user_type', $type)->countAllResults();
    }
}