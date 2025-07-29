<?php

namespace App\Models;

use CodeIgniter\Model;

class PpmpModel extends Model
{
    protected $table            = 'ppmp_tbl';
    protected $primaryKey       = 'ppmp_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ppmp_status',
        'saved_by_user_id_fk',
        'ppmp_office_fk',
        'ppmp_total_proposed_budget',
        'ppmp_total_budget_allocated',
        'ppmp_period_covered',
        'ppmp_prepared_by_name',
        'ppmp_evaluated_by_name',
        'ppmp_remarks',
        'ppmp_date_approved',
        'ppmp_recommended_by_name',
        'ppmp_prepared_by_position',
        'ppmp_recommended_by_position',
        'ppmp_evaluated_by_position',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function updateStatus(int $ppmpId, string $status)
    {
        return $this->update($ppmpId, ['ppmp_status' => $status]);
    }

    /**
     * Checks if a user has an approved PPMP for the current year.
     */
    public function hasApprovedPpmpForUser(int $userId): bool
    {
        $currentYear = date('Y');
        $result = $this->where('saved_by_user_id_fk', $userId)
                        ->where('ppmp_status', 'Approved')
                        ->where('YEAR(ppmp_date_approved)', $currentYear)
                        ->first();

        return $result !== null;
    }

    public function hasApprovedPpmpForDepartment(int $departmentId): bool
    {
        $currentYear = date('Y');
        $builder = $this->db->table($this->table . ' as pml');
        $builder->join('user_role_department_tbl as urd', 'pml.saved_by_user_id_fk = urd.user_id');
        $builder->where('urd.department_id', $departmentId);
        $builder->where('pml.ppmp_status', 'Approved');
        $builder->where('YEAR(pml.ppmp_date_approved)', $currentYear);
        $query = $builder->get();

        return $query->getRow() !== null;
    }
}
