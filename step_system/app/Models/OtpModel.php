<?php namespace App\Models;

use CodeIgniter\Model;

class OtpModel extends Model
{
    protected $table = 'otp_temp_tbl';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'email', 
        'otp_code', 
        'created_at', 
        'expires_at'
    ];
    
    protected $useTimestamps = false; // We'll manage created_at/expires_at manually for OTP

    /**
     * Retrieves an OTP record by email.
     *
     * @param string $email The email address.
     * @return array|null The OTP record as an array, or null if not found.
     */
    public function getOtpByEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }

    /**
     * Saves or updates an OTP record.
     *
     * @param string $email The email address.
     * @param string $otpCode The OTP code.
     * @param int $expiryMinutes The number of minutes until the OTP expires.
     * @return int|bool The insert ID on success, or true/false on update success/failure.
     */
    public function saveOtp(string $email, string $otpCode, int $expiryMinutes = 5)
    {
        $created_at = date('Y-m-d H:i:s');
        $expires_at = date('Y-m-d H:i:s', strtotime("+$expiryMinutes minutes"));

        $data = [
            'email' => $email,
            'otp_code' => $otpCode,
            'created_at' => $created_at,
            'expires_at' => $expires_at,
        ];

        // Check if OTP already exists for this email
        $existingOtp = $this->getOtpByEmail($email);
        if ($existingOtp) {
            // Update existing OTP
            $this->update($existingOtp['id'], $data);
            return $existingOtp['id']; // Return ID for consistency
        } else {
            // Insert new OTP
            $this->insert($data);
            return $this->insertID();
        }
    }

    /**
     * Deletes an OTP record by email.
     *
     * @param string $email The email address.
     * @return bool True on success, false on failure.
     */
    public function deleteOtpByEmail(string $email)
    {
        return $this->where('email', $email)->delete();
    }
}