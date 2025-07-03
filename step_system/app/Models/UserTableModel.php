<?php

namespace App\Models;

use CodeIgniter\Model;

class UserTableModel extends Model
{
    protected $table            = 'user_tbl';
    protected $primaryKey       = 'user_id';
    protected $allowedFields    = [
        'user_firstname', 
        'user_lastname', 
        'user_email',
        'user_type',
        'user_tupid'
    ];

}
