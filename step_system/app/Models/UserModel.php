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
        'user_role_fk',
        'user_dep_fk'
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

    public function authenticateUser(array $data) {
        $user = $this->where('user_email', $data['user_email'])->first();

        if ($user && password_verify($data['user_password'], $user['user_password'])) {
            return $user;
        } else {
            return false;
        }
    }
    
}