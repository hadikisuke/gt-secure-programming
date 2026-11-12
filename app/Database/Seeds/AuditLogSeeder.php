<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class AuditLogSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => null,
                'action' => 'CREATE',
                'module' => 'products',
                'record_id' => 1,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'GTPIS Seeder',
                'metadata' => json_encode([
                    'source' => 'seed',
                ]),
                'created_at' => '2026-09-01 08:00:00',
            ],
            [
                'user_id' => null,
                'action' => 'CREATE',
                'module' => 'materials',
                'record_id' => 1,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'GTPIS Seeder',
                'metadata' => json_encode([
                    'source' => 'seed',
                ]),
                'created_at' => '2026-09-01 08:01:00',
            ],
            [
                'user_id' => null,
                'action' => 'CREATE',
                'module' => 'production',
                'record_id' => 1,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'GTPIS Seeder',
                'metadata' => json_encode([
                    'source' => 'seed',
                ]),
                'created_at' => '2026-09-01 08:02:00',
            ],
        ];

        $this->db->table('audit_logs')->insertBatch($data);
    }
}
