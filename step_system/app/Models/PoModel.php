<?php

namespace App\Models;

use CodeIgniter\Model;

class PoModel extends Model
{
    protected $table            = 'po_tbl';
    protected $primaryKey       = 'po_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'po_status',
        'po_pr_items_id_fk',
        'po_supplier',
        'po_ponumber',
        'po_date',
        'po_address',
        'po_tele',
        'po_tin',
        'po_mode',
        'po_tuptin',
        'po_place_delivery',
        'po_delivery_term',
        'po_date_delivery',
        'po_payment_term',
        'po_fund_cluster',
        'po_fund_available',
        'po_orsburs',
        'po_date_orsburs',
        'po_amount',
        'po_description',
        'po_amount_in_words',
        'conforme_name_of_supplier',
        'conforme_date',
        'conforme_campus_director',
        'po_accountant',
        'po_total_amount',
        'po_remarks',
        'saved_by_user_id_fk',
        'po_signed_by_fk',
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
