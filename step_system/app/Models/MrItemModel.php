<?php

namespace App\Models;

use CodeIgniter\Model;

class MrItemModel extends Model
{
    protected $table            = 'view_user_mr_items';
    protected $primaryKey       = 'mr_item_id';
    protected $useAutoIncrement = false; // Views are generally not auto-incrementing
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'user_lastname',
        'mr_id',
        'mr_item_id',
        'item_name',
        'mr_item_unit',
        'mr_item_quantity',
        'mr_location',
        'mr_date_received'
    ];

    // Dates
    protected $useTimestamps = false;

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

    // MR Items of a user
    public function getMrItemsByUserId(int $userId)
    {
        return $this->select('mr_id, mr_item_id, item_name, mr_item_unit, mr_item_quantity, mr_location, mr_date_received')
                    ->where('user_id', $userId)
                    ->findAll();
    }
}
