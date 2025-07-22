<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterKeyModel extends Model
{
    protected $table = 'master_keys_tbl';
    protected $primaryKey = 'master_key_id';
    protected $allowedFields = ['master_key', 'master_key_is_used'];

    // Method to get a master key by its value
    public function getMasterKey(string $masterKey): ?array
    {
        return $this->where('master_key', $masterKey)->first();
    }

    // Method to mark a master key as used
    public function markKeyAsUsed(int $masterKeyId): bool
    {
        return $this->update($masterKeyId, ['master_key_is_used' => 1]);
    }
}
