<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'tasks_tbl';
    protected $primaryKey       = 'task_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'submitted_by',
        'submitted_to',
        'ppmp_id_fk',
        'app_id_fk',
        'task_type',
        'task_description',
        'is_deleted',
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'is_deleted';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['addCreatedBy'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getTasksForUser(int $userId)
    {
        return $this->select('tasks_tbl.task_id, tasks_tbl.task_type, tasks_tbl.created_at, users_tbl.user_fullname as submitted_by_name, ppmp_tbl.ppmp_status, app_tbl.app_status')
                    ->join('users_tbl', 'users_tbl.user_id = tasks_tbl.submitted_by')
                    ->join('ppmp_tbl', 'ppmp_tbl.ppmp_id = tasks_tbl.ppmp_id_fk', 'left')
                    ->join('app_tbl', 'app_tbl.app_id = tasks_tbl.app_id_fk', 'left')
                    ->where('tasks_tbl.submitted_to', $userId)
                    ->orderBy('tasks_tbl.created_at', 'DESC')
                    ->findAll();
    }

    public function getTaskDetails(int $taskId)
    {
        return $this->select('tasks_tbl.created_at, tasks_tbl.task_description, tasks_tbl.ppmp_id_fk, tasks_tbl.app_id_fk, users_tbl.user_fullname, users_tbl.user_email, roles_tbl.role_name, ppmp_tbl.ppmp_status, app_tbl.app_status')
                    ->join('users_tbl', 'users_tbl.user_id = tasks_tbl.submitted_by')
                    ->join('user_role_department_tbl', 'user_role_department_tbl.user_id = users_tbl.user_id', 'left')
                    ->join('roles_tbl', 'roles_tbl.role_id = user_role_department_tbl.role_id', 'left')
                    ->join('ppmp_tbl', 'ppmp_tbl.ppmp_id = tasks_tbl.ppmp_id_fk', 'left')
                    ->join('app_tbl', 'app_tbl.app_id = tasks_tbl.app_id_fk', 'left')
                    ->where('tasks_tbl.task_id', $taskId)
                    ->first();
    }
}