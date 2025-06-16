<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOtpTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique' => true, // Ensure only one OTP per email at a time
            ],
            'otp_code' => [
                'type' => 'VARCHAR',
                'constraint' => '6', // For a 6-digit OTP
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true, // Allow null, we'll manage manually
            ],
            'expires_at' => [
                'type' => 'DATETIME',
                'null' => true, // Allow null, we'll manage manually
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('otp_temp_tbl');
    }

    public function down()
    {
        $this->forge->dropTable('otp_temp_tbl');
    }
}