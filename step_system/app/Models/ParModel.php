<?php

namespace App\Models;

use CodeIgniter\Model;

class ParModel extends Model
{
    protected $table            = 'par_tbl';
    protected $primaryKey       = 'prop_ack_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'prop_ack_status',
        'prop_ack_po_item_id_fk',
        'par_fund_cluster',
        'par_po_no',
        'par_no',
        'par_code_no',
        'prop_ack_received_by_fk',
        'prop_ack_received_date',
        'prop_ack_issued_by_fk',
        'prop_ack_issued_date',
        'prop_ack_deli_stats',
        'prop_ack_bid_stats',
        'saved_by_user_id_fk',
        'par_received_from_user_fk',
        'par_received_from_date',
        'par_issued_by_user_fk',
        'par_issued_by_date',
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

    public function updateStatus(int $parId, string $status)
    {
        return $this->update($parId, ['prop_ack_status' => $status]);
    }
} 