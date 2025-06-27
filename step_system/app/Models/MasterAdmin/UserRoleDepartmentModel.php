<?php

namespace App\Models\MasterAdmin;

use CodeIgniter\Model;

class UserRoleDepartmentModel extends Model
{
    protected $table = 'user_role_department_tbl';
    protected $primaryKey = 'id'; // Changed from array to 'id'
    protected $allowedFields = ['user_id', 'role_id', 'department_id'];

    // Method to update department for a specific user and role
    // NOTE: This method is NOT currently used by the MARolesAssignmentController.
    // The controller directly uses CodeIgniter's Query Builder and Model's update/insert methods.
    // If you plan to use this method, its logic would need to be re-evaluated based on the single 'id' primary key.
    public function updateUserDepartment($userId, $oldDepartmentId, $newDepartmentId)
    {
        // This method is not used in the controller. The controller directly uses
        // $this->db->table()->where()->delete() and Model->update().
        // If it were to be used, its logic would need to be re-evaluated
        // based on the single 'id' primary key.
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
} 