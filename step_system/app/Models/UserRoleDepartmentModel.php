<?php

namespace App\Models;

use CodeIgniter\Model;

class UserRoleDepartmentModel extends Model
{
    protected $table = 'user_role_department_tbl';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'role_id',
        'department_id'
    ];

    // Method to insert a new record into user_role_department_tbl
    public function insertUserRoleDepartment(int $userId, int $depId)
    {
        return $this->insert([
            'user_id' => $userId,
            'department_id' => $depId
        ]);
    }

    // Method to update department for a specific user and role
    public function updateUserDepartment($userId, $oldDepartmentId, $newDepartmentId)
    {
        $currentAssignment = $this->where(['user_id' => $userId, 'department_id' => $oldDepartmentId])->first();

        if ($currentAssignment) {
            // Delete the old assignment
            $this->where(['user_id' => $userId, 'role_id' => $currentAssignment['role_id'], 'department_id' => $oldDepartmentId])->delete();

            // Insert the new assignment with the same role_id but new department_id
            $data = [
                'user_id' => $userId,
                'role_id' => $currentAssignment['role_id'],
                'department_id' => $newDepartmentId,
            ];
            return $this->insert($data);
        }
        return false;
    }

    // Show the users within the same department of the Office Head
    public function getUsersInSameDepartment(int $currentUserId, int $departmentId): array
    {
        return $this->select('users_tbl.user_id, users_tbl.user_tupid, users_tbl.user_firstname, users_tbl.user_lastname, users_tbl.user_type')
                    ->join('users_tbl', 'user_role_department_tbl.user_id = users_tbl.user_id')
                    ->where('user_role_department_tbl.department_id', $departmentId)
                    ->where('users_tbl.user_id !=', $currentUserId) // Exclude the current user
                    ->findAll();
    }

    // public funtion


} 