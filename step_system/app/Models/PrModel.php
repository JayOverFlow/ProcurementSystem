<?php

namespace App\Models;

use CodeIgniter\Model;

class PrModel extends Model
{
    protected $table            = 'pr_tbl';
    protected $primaryKey       = 'pr_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'pr_app_item_id_fk',
        'pr_section',
        'pr_status',
        'saved_by_user_id_fk',
        'pr_department',
        'pr_no_date',
        'pr_sai_no_date',
        'pr_requested_by_name',
        'pr_requested_by_designation',
        'pr_approved_by_name',
        'pr_approved_by_designation'
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

    public function updateStatus(int $prId, string $status)
    {
        return $this->update($prId, ['pr_status' => $status]);
    }
}
