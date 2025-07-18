<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table = 'departments_tbl';
    protected $primaryKey = 'dep_id';
    protected $allowedFields = [
        'dep_name',
        'dep_type'
    ];

    public function getAllDepartments()
    {
        return $this->orderBy('dep_name', 'ASC')->findAll();
    }

    public function getDepartmentNameById(int $depId) {
        return $this->select('dep_name')
                    ->where('dep_id', $depId)
                    ->first()['dep_name'];
    }

    public function countDepartmentsByType(string $type)
    {
        return $this->where('dep_type', $type)->countAllResults();
    }
} 