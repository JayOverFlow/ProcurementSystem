<?php

namespace App\Models;

use CodeIgniter\Model;

class InventCustoModel extends Model
{
    protected $table            = 'invent_custo_tbl';
    protected $primaryKey       = 'invent_custo_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'invent_custo_prop_ack_fk',
        'invent_custo_user_id_fk',
        'invent_custo_fund_cluster',
        'invent_custo_po_no',
        'invent_custo_ics_no',
        'invent_custo_code',
        'invent_custo_item_no',
        'invent_custo_est_life',
        'invent_custo_received_from_fk',
        'invent_custo_received_from_date',
        'invent_custo_received_by_fk',
        'invent_custo_received_by_date',
        'invent_custo_tbl_remarks'
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
