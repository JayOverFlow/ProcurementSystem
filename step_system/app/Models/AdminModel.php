<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins_tbl';
    protected $primaryKey = 'admin_id';
    protected $allowedFields = ['admin_username', 'admin_password', 'admin_key'];

    // Method to insert a new admin user
    public function insertAdmin(array $data): bool
    {
        $data['admin_password'] = password_hash($data['admin_password'], PASSWORD_DEFAULT);
        return $this->insert($data);
    }

    // Method to authenticate admin user
    public function authenticateAdmin(string $username, string $password): ?array
    {
        $admin = $this->where('admin_username', $username)->first();
        if ($admin && password_verify($password, $admin['admin_password'])) {
            return $admin;
        }
        return null;
    }

    // Method to get admin by username
    public function getAdminByUsername(string $username): ?array
    {
        return $this->where('admin_username', $username)->first();
    }
}
