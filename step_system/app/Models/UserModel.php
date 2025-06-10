<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {

    protected $table = 'users_tbl';
    protected $primaryKey = 'user_id';
    protected $user_email;

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

    public function __construct($user_email = null)
    {
        parent::__construct();
        $this->user_email = $user_email;
    }

    public function getUserByEmail() {
        return $this->where('user_email', $this->user_email)->first();
    }
}