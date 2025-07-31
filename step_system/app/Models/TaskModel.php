<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\UserRoleDepartmentModel;

class TaskModel extends Model
{
    protected $table            = 'tasks_tbl';
    protected $primaryKey       = 'task_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false; // Disable soft deletes to fix configuration conflict
    protected $protectFields    = true;
    protected $allowedFields    = [
        'submitted_by',
        'submitted_to',
        'task_description',
        'created_at',
        'ppmp_id_fk',
        'app_id_fk',
        'task_type',
        'is_deleted',
        'pr_id_fk',
        'po_id_fk',
        'par_id_fk', // Added to allowed fields to ensure it can be assigned
        'ics_id_fk', // Added to allowed fields to ensure it can be assigned
        'task_status',
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
    protected $deletedField  = 'is_deleted';

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

    public function getTasksForUser(int $userId)
    {
        // Get the IDs of the current user's subordinates
        $userRoleDepModel = new UserRoleDepartmentModel();
        $userDepId = session()->get('user_dep_id');
        $subordinates = $userRoleDepModel->getUsersInSameDepartment($userId, $userDepId);
        $subordinateIds = array_map(function($sub) { return $sub['user_id']; }, $subordinates);

        $builder = $this->withDeleted()
            ->select('tasks_tbl.task_id, tasks_tbl.task_type, tasks_tbl.created_at, tasks_tbl.task_status, users_tbl.user_fullname as submitted_by_name, ppmp_tbl.ppmp_status, app_tbl.app_status, pr_tbl.pr_status, po_tbl.po_status, par_tbl.prop_ack_status, ics_tbl.invent_custo_status')
            ->join('users_tbl', 'users_tbl.user_id = tasks_tbl.submitted_by')
            ->join('ppmp_tbl', 'ppmp_tbl.ppmp_id = tasks_tbl.ppmp_id_fk', 'left')
            ->join('app_tbl', 'app_tbl.app_id = tasks_tbl.app_id_fk', 'left')
            ->join('pr_tbl', 'pr_tbl.pr_id = tasks_tbl.pr_id_fk', 'left')
            ->join('po_tbl', 'po_tbl.po_id = tasks_tbl.po_id_fk', 'left')
            ->join('par_tbl', 'par_tbl.prop_ack_id = tasks_tbl.par_id_fk', 'left')
            ->join('ics_tbl', 'ics_tbl.invent_custo_id = tasks_tbl.ics_id_fk', 'left');

        $builder->groupStart(); // Main group start

        // Condition 1: Tasks directly assigned to the current user
        $builder->where('tasks_tbl.submitted_to', $userId);

        // Condition 2: Tasks submitted by subordinates that are now approved (processed by the Head)
        if (!empty($subordinateIds)) {
            $builder->orGroupStart()
                ->whereIn('tasks_tbl.submitted_by', $subordinateIds)
                ->where('ppmp_tbl.ppmp_status', 'Approved')
            ->groupEnd();
        }

        $builder->groupEnd(); // Main group end

        $builder->where('tasks_tbl.is_deleted', 0)
                ->orderBy('tasks_tbl.created_at', 'DESC');

        return $builder->findAll();
    }

    public function getTaskDetails(int $taskId)
    {
        return $this->withDeleted()
                    ->select("tasks_tbl.created_at, tasks_tbl.task_description, tasks_tbl.ppmp_id_fk, tasks_tbl.app_id_fk, tasks_tbl.pr_id_fk, tasks_tbl.po_id_fk, tasks_tbl.par_id_fk, tasks_tbl.ics_id_fk, users_tbl.user_fullname, users_tbl.user_email, GROUP_CONCAT(roles_tbl.role_name SEPARATOR ', ') as role_name, ppmp_tbl.ppmp_status, app_tbl.app_status, pr_tbl.pr_status, po_tbl.po_status, par_tbl.prop_ack_status, ics_tbl.invent_custo_status")
                    ->join('users_tbl', 'users_tbl.user_id = tasks_tbl.submitted_by')
                    ->join('user_role_department_tbl', 'user_role_department_tbl.user_id = tasks_tbl.submitted_by', 'left')
                    ->join('roles_tbl', 'roles_tbl.role_id = user_role_department_tbl.role_id', 'left')
                    ->join('ppmp_tbl', 'ppmp_tbl.ppmp_id = tasks_tbl.ppmp_id_fk', 'left')
                    ->join('app_tbl', 'app_tbl.app_id = tasks_tbl.app_id_fk', 'left')
                    ->join('pr_tbl', 'pr_tbl.pr_id = tasks_tbl.pr_id_fk', 'left')
                    ->join('po_tbl', 'po_tbl.po_id = tasks_tbl.po_id_fk', 'left')
                    ->join('par_tbl', 'par_tbl.prop_ack_id = tasks_tbl.par_id_fk', 'left') // Added join for par_tbl
                    ->join('ics_tbl', 'ics_tbl.invent_custo_id = tasks_tbl.ics_id_fk', 'left') // Added join for ics_tbl
                    ->where('tasks_tbl.task_id', $taskId)
                    ->groupStart()
                        ->where('tasks_tbl.is_deleted', 0)
                        ->orWhere('ppmp_tbl.ppmp_status', 'Approved')
                    ->groupEnd()
                    ->groupBy([
                        'tasks_tbl.task_id',
                        'tasks_tbl.created_at',
                        'tasks_tbl.task_description',
                        'tasks_tbl.ppmp_id_fk',
                        'tasks_tbl.app_id_fk',
                        'tasks_tbl.pr_id_fk',
                        'tasks_tbl.po_id_fk',
                        'tasks_tbl.par_id_fk',
                        'tasks_tbl.ics_id_fk',
                        'users_tbl.user_fullname',
                        'users_tbl.user_email',
                        'ppmp_tbl.ppmp_status',
                        'app_tbl.app_status',
                        'pr_tbl.pr_status',
                        'po_tbl.po_status',
                        'par_tbl.prop_ack_status',
                        'ics_tbl.invent_custo_status'
                    ])
                    ->first();
    }

    public function getTaskByAppId($appId) {
        return $this->withDeleted()
                    ->where('app_id_fk', $appId)
                    ->where('is_deleted', 0)
                    ->first();
    }

    public function getTaskByPrId($prId) {
        return $this->withDeleted()
                    ->where('pr_id_fk', $prId)
                    ->where('is_deleted', 0)
                    ->first();
    }

    public function getTaskByPoId($poId) {
        return $this->withDeleted()
                    ->where('po_id_fk', $poId)
                    ->where('is_deleted', 0)
                    ->first();
    }

    public function getTaskByParId($parId) {
        return $this->withDeleted()
                    ->where('par_id_fk', $parId)
                    ->where('is_deleted', 0)
                    ->first();
    }

    public function getTaskByIcsId($icsId) {
        return $this->withDeleted()
                    ->where('ics_id_fk', $icsId)
                    ->where('is_deleted', 0)
                    ->first();
    }

    /**
     * Creates a new task assignment for PPMP.
     *
     * @param array $data The data for the new task assignment.
     * @return bool True on success, false on failure.
     */
    public function assignPpmpTask(array $data): bool
    {
        // The insert method returns the new ID on success, or false on failure.
        // We return a boolean to indicate the outcome.
        return $this->insert($data) !== false;
    }

    /**
     * Checks if a user has an active PPMP assignment.
     *
     * @param int $userId The ID of the user to check.
     * @return bool True if an active assignment exists, false otherwise.
     */
    public function hasActivePpmpAssignment(int $userId): bool
    {
        $result = $this->where([
            'submitted_to' => $userId,
            'task_type'    => 'PPMP Assignment'
        ])->first();

        return !empty($result);
    }

    public function getActivePrAssigneeForDepartment(int $departmentId): ?array
    {
        return $this->select('tasks_tbl.submitted_to, users_tbl.user_fullname')
                    ->join('user_role_department_tbl as urd', 'urd.user_id = tasks_tbl.submitted_to')
                    ->join('users_tbl', 'users_tbl.user_id = tasks_tbl.submitted_to')
                    ->where('urd.department_id', $departmentId)
                    ->where('tasks_tbl.task_type', 'PR Assignment')
                    ->first();
    }

    public function hasActivePpmpAssignmentForDepartment(int $departmentId): bool
    {
        $result = $this->join('user_role_department_tbl as urd', 'urd.user_id = tasks_tbl.submitted_to')
                         ->where('urd.department_id', $departmentId)
                         ->where('tasks_tbl.task_type', 'PPMP Assignment')
                         ->first();

        return !empty($result);
    }
}