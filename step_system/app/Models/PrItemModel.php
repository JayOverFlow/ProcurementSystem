<?php

namespace App\Models;

use CodeIgniter\Model;

class PrItemModel extends Model
{
    protected $table            = 'pr_items_tbl';
    protected $primaryKey       = 'pr_items_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'pr_id_fk',
        'pr_items_quantity',
        'pr_items_cost',
        'pr_items_total_cost',
        'pr_items_unit',
        'pr_items_descrip',
        'bidding_status' // Added for bidding status
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

    public function areAllItemsSuccessful(int $prId): bool
    {
        // Count items for the given PR that are NOT 'successful'
        $count = $this->where('pr_id_fk', $prId)
                      ->where('bidding_status !=', 'successful')
                      ->countAllResults();
        return $count === 0; // True if all are 'successful'
    }
}
