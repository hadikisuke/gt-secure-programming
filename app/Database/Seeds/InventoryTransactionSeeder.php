<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InventoryTransactionSeeder extends Seeder
{
    public function run()
    {
        $materials = $this->db
            ->table('materials')
            ->select('id, material_code')
            ->get()
            ->getResultArray();

        $materialMap = [];

        foreach ($materials as $material) {
            $materialMap[$material['material_code']] = $material['id'];
        }

        $data = [
            [
                'transaction_code' => 'TRX-0001',
                'material_id' => $materialMap['MAT-001'],
                'type' => 'IN',
                'quantity' => 1000,
                'reference_type' => 'manual',
                'reference_id' => null,
                'notes' => 'Initial stock',
                'created_by' => null,
            ],
            [
                'transaction_code' => 'TRX-0002',
                'material_id' => $materialMap['MAT-001'],
                'type' => 'OUT',
                'quantity' => 120,
                'reference_type' => 'production_order',
                'reference_id' => null,
                'notes' => 'Production usage',
                'created_by' => null,
            ],
            [
                'transaction_code' => 'TRX-0003',
                'material_id' => $materialMap['MAT-002'],
                'type' => 'IN',
                'quantity' => 500,
                'reference_type' => 'manual',
                'reference_id' => null,
                'notes' => 'Initial stock',
                'created_by' => null,
            ],
            [
                'transaction_code' => 'TRX-0004',
                'material_id' => $materialMap['MAT-002'],
                'type' => 'OUT',
                'quantity' => 35,
                'reference_type' => 'production_order',
                'reference_id' => null,
                'notes' => 'Production usage',
                'created_by' => null,
            ],
            [
                'transaction_code' => 'TRX-0005',
                'material_id' => $materialMap['MAT-003'],
                'type' => 'IN',
                'quantity' => 200,
                'reference_type' => 'manual',
                'reference_id' => null,
                'notes' => 'Initial stock',
                'created_by' => null,
            ],
            [
                'transaction_code' => 'TRX-0006',
                'material_id' => $materialMap['MAT-004'],
                'type' => 'IN',
                'quantity' => 2500,
                'reference_type' => 'manual',
                'reference_id' => null,
                'notes' => 'Initial stock',
                'created_by' => null,
            ],
            [
                'transaction_code' => 'TRX-0007',
                'material_id' => $materialMap['MAT-004'],
                'type' => 'OUT',
                'quantity' => 200,
                'reference_type' => 'production_order',
                'reference_id' => null,
                'notes' => 'Production usage',
                'created_by' => null,
            ],
            [
                'transaction_code' => 'TRX-0008',
                'material_id' => $materialMap['MAT-005'],
                'type' => 'IN',
                'quantity' => 300,
                'reference_type' => 'manual',
                'reference_id' => null,
                'notes' => 'Initial stock',
                'created_by' => null,
            ],
            [
                'transaction_code' => 'TRX-0009',
                'material_id' => $materialMap['MAT-006'],
                'type' => 'IN',
                'quantity' => 150,
                'reference_type' => 'manual',
                'reference_id' => null,
                'notes' => 'Initial stock',
                'created_by' => null,
            ],
            [
                'transaction_code' => 'TRX-0010',
                'material_id' => $materialMap['MAT-007'],
                'type' => 'IN',
                'quantity' => 200,
                'reference_type' => 'manual',
                'reference_id' => null,
                'notes' => 'Initial stock',
                'created_by' => null,
            ],
        ];

        $this->db->table('inventory_transactions')->insertBatch($data);
    }
}
