<?php

namespace App\Models;

use CodeIgniter\Model;

class AppItemModel extends Model
{
    protected $table            = 'app_items_tbl';
    protected $primaryKey       = 'app_item_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'app_id_fk',
        'app_item_name',
        'app_item_quantity',
        'app_item_pmo',
        'app_item_moed',
        'app_item_estimated_total',
        'app_item_estimated_mooe',
        'app_item_estimated_co',
        'app_item_remarks',
        'app_item_adspost',
        'app_item_subopen',
        'app_item_notice',
        'app_item_contract',
        'app_item_source_fund'

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
}
