<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_code' => 'P-001',
                'name' => 'GT Tire 175/70 R14',
                'description' => 'Passenger tire 175/70 R14',
                'unit' => 'pcs',
                'minimum_stock' => 100,
                'status' => 'ACTIVE',
                'created_at' => '2026-09-01 08:00:00',
                'updated_at' => '2026-09-01 08:00:00',
            ],
            [
                'product_code' => 'P-002',
                'name' => 'GT Tire 185/65 R15',
                'description' => 'Passenger tire 185/65 R15',
                'unit' => 'pcs',
                'minimum_stock' => 100,
                'status' => 'ACTIVE',
                'created_at' => '2026-09-01 08:00:00',
                'updated_at' => '2026-09-01 08:00:00',
            ],
            [
                'product_code' => 'P-003',
                'name' => 'GT Tire 195/65 R15',
                'description' => 'Passenger tire 195/65 R15',
                'unit' => 'pcs',
                'minimum_stock' => 80,
                'status' => 'ACTIVE',
                'created_at' => '2026-09-01 08:00:00',
                'updated_at' => '2026-09-01 08:00:00',
            ],
            [
                'product_code' => 'P-004',
                'name' => 'GT Tube 14',
                'description' => 'Inner tube size 14',
                'unit' => 'pcs',
                'minimum_stock' => 50,
                'status' => 'ACTIVE',
                'created_at' => '2026-09-01 08:00:00',
                'updated_at' => '2026-09-01 08:00:00',
            ],
            [
                'product_code' => 'P-005',
                'name' => 'GT Tube 15',
                'description' => 'Inner tube size 15',
                'unit' => 'pcs',
                'minimum_stock' => 50,
                'status' => 'ACTIVE',
                'created_at' => '2026-09-01 08:00:00',
                'updated_at' => '2026-09-01 08:00:00',
            ],
            [
                'product_code' => 'P-006',
                'name' => 'GT Tire 205/65 R16',
                'description' => 'Passenger tire 205/65 R16',
                'unit' => 'pcs',
                'minimum_stock' => 80,
                'status' => 'ACTIVE',
                'created_at' => '2026-09-01 08:00:00',
                'updated_at' => '2026-09-01 08:00:00',
            ],
            [
                'product_code' => 'P-007',
                'name' => 'GT Tire 215/60 R16',
                'description' => 'Passenger tire 215/60 R16',
                'unit' => 'pcs',
                'minimum_stock' => 80,
                'status' => 'ACTIVE',
                'created_at' => '2026-09-01 08:00:00',
                'updated_at' => '2026-09-01 08:00:00',
            ],
            [
                'product_code' => 'P-008',
                'name' => 'GT Tire 225/55 R17',
                'description' => 'Passenger tire 225/55 R17',
                'unit' => 'pcs',
                'minimum_stock' => 60,
                'status' => 'ACTIVE',
                'created_at' => '2026-09-01 08:00:00',
                'updated_at' => '2026-09-01 08:00:00',
            ],
            [
                'product_code' => 'P-009',
                'name' => 'GT Tube 16',
                'description' => 'Inner tube size 16',
                'unit' => 'pcs',
                'minimum_stock' => 50,
                'status' => 'ACTIVE',
                'created_at' => '2026-09-01 08:00:00',
                'updated_at' => '2026-09-01 08:00:00',
            ],
            [
                'product_code' => 'P-010',
                'name' => 'GT Tube 17',
                'description' => 'Inner tube size 17',
                'unit' => 'pcs',
                'minimum_stock' => 50,
                'status' => 'ACTIVE',
                'created_at' => '2026-09-01 08:00:00',
                'updated_at' => '2026-09-01 08:00:00',
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }
}
