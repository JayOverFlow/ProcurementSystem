<?php

namespace App\Models;

use CodeIgniter\Model;

class PropAckModel extends Model
{
    protected $table            = 'prop_ack_tbl';
    protected $primaryKey       = 'prop_ack_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'prop_ack_po_item_id_fk',
        'prop_ack_number',
        'prop_ack_date_acq',
        'prop_ack_amount',
        'prop_ack_received_by_fk',
        'prop_ack_received_date',
        'prop_ack_issued_by_fk',
        'prop_ack_issued_date',
        'prop_ack_deli_stats',
        'prop_ack_bid_stats'
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
