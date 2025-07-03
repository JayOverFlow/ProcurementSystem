<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles_tbl';
    protected $primaryKey = 'role_id';
    protected $allowedFields = ['role_name', 'role_dep_id_fk', 'role_parent_role_id'];

} 