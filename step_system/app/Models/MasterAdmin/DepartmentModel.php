<?php

namespace App\Models\MasterAdmin;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table = 'departments_tbl';
    protected $primaryKey = 'dep_id';
    protected $allowedFields = ['dep_name', 'dep_type'];

    public function getAllDepartments()
    {
        return $this->findAll();
    }

    public function countDepartmentsByType(string $type)
    {
        return $this->where('dep_type', $type)->countAllResults();
    }
} 