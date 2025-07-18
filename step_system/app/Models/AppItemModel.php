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
        'app_item_pmo',
        'app_item_mode',
        'app_item_estimated_total',
        'app_item_estimated_mooe',
        'app_item_estimated_co',
        'app_item_remarks',
        'app_item_adspost',
        'app_item_subopen',
        'app_item_notice',
        'app_item_contract',
        'app_item_source_fund',
        'app_item_code',
    ];

    // Dates
    protected $useTimestamps = false;
}
