<?php

namespace App\Models;

use CodeIgniter\Model;

class AppModel extends Model
{
    protected $table            = 'app_tbl';
    protected $primaryKey       = 'app_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'app_ppmp_items_id_fk',
        'app_status',
        'app_prepared_by_name',
        'app_prepared_by_designation',
        'app_recommending_by_name',
        'app_recommending_by_designation',
        'app_approved_by_name',
        'app_approved_by_designation',
    ];

    // Dates
    protected $useTimestamps = false;
}
