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
        'user_type'
    ];

}