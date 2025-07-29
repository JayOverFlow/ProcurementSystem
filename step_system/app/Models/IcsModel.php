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
        'ics_fund_cluster',
        'ics_po_no',
        'ics_par_no',
        'ics_code_no',
        'ics_received_from_user_fk',
        'ics_received_from_date',
        'ics_received_by_user_fk',
        'ics_received_by_date_fk',
        'saved_by_user_id_fk',
    ];

    // Dates
    protected $useTimestamps = false;

    public function updateStatus(int $icsId, string $status)
    {
        return $this->update($icsId, ['invent_custo_status' => $status]);
    }

    public function getIcsWithItems(int $icsId)
    {
        return $this->select('ics_tbl.*, users_tbl.user_fullname as saved_by_user_fullname')
                    ->join('users_tbl', 'users_tbl.user_id = ics_tbl.saved_by_user_id_fk', 'left')
                    ->where('invent_custo_id', $icsId)
                    ->first();
    }
} 