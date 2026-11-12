<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class SupplierSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'supplier_code' => 'SUP-001',
                'name' => 'Supplier Material A',
                'address' => 'Tangerang',
                'phone' => '021-5550001',
                'email' => 'supplier.a@example.test',
                'status' => 'ACTIVE',
            ],
            [
                'supplier_code' => 'SUP-002',
                'name' => 'Supplier Material B',
                'address' => 'Jakarta',
                'phone' => '021-5550002',
                'email' => 'supplier.b@example.test',
                'status' => 'ACTIVE',
            ],
            [
                'supplier_code' => 'SUP-003',
                'name' => 'Supplier Material C',
                'address' => 'Bekasi',
                'phone' => '021-5550003',
                'email' => 'supplier.c@example.test',
                'status' => 'ACTIVE',
            ],
            [
                'supplier_code' => 'SUP-004',
                'name' => 'Supplier Material D',
                'address' => 'Karawang',
                'phone' => '021-5550004',
                'email' => 'supplier.d@example.test',
                'status' => 'ACTIVE',
            ],
            [
                'supplier_code' => 'SUP-005',
                'name' => 'Supplier Material E',
                'address' => 'Bandung',
                'phone' => '022-5550005',
                'email' => 'supplier.e@example.test',
                'status' => 'ACTIVE',
            ],
        ];

        $this->db->table('suppliers')->insertBatch($data);
    }
}
