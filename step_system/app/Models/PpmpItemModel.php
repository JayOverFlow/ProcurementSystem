<?php

namespace App\Models;

use CodeIgniter\Model;

class PpmpItemModel extends Model
{
    protected $table            = 'ppmp_items_tbl';
    protected $primaryKey       = 'ppmp_item_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ppmp_id_fk',
        'ppmp_item_code',
        'ppmp_item_name',
        'ppmp_item_quantity',
        'ppmp_item_estimated_budget',
        'ppmp_sched_jan',
        'ppmp_sched_feb',
        'ppmp_sched_mar',
        'ppmp_sched_apr',
        'ppmp_sched_may',
        'ppmp_sched_jun',
        'ppmp_sched_jul',
        'ppmp_sched_aug',
        'ppmp_sched_sep',
        'ppmp_sched_oct',
        'ppmp_sched_nov',
        'ppmp_sched_dec',
    ];

    protected bool $allowEmptyInserts = false;

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
}
