<?php

namespace App\Models;

use CodeIgniter\Model;

class IcsModel extends Model
{
    protected $table = 'ics_tbl';
    protected $primaryKey = 'invent_custo_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'invent_custo_status',
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
        'invent_custo_tbl_remarks',
        'saved_by_user_id_fk'
    ];

    // Dates
    protected $useTimestamps = false;

    public function updateStatus(int $icsId, string $status)
    {
        return $this->update($icsId, ['invent_custo_status' => $status]);
    }
} 