<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password_hash' => password_hash('admin123', PASSWORD_DEFAULT),
                'full_name' => 'Administrator',
                'role' => 'ADMIN',
                'status' => 'ACTIVE',
            ],
            [
                'username' => 'staff',
                'email' => 'staff@gmail.com',
                'password_hash' => password_hash('staff123', PASSWORD_DEFAULT),
                'full_name' => 'Staff Inventory',
                'role' => 'STAFF',
                'status' => 'ACTIVE',
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
