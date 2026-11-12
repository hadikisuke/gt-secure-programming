<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductionOrderItemSeeder extends Seeder
{
    public function run()
    {
        $orders = $this->db
            ->table('production_orders')
            ->select('id, order_number')
            ->get()
            ->getResultArray();

        $materials = $this->db
            ->table('materials')
            ->select('id, material_code')
            ->get()
            ->getResultArray();

        $orderMap = [];

        foreach ($orders as $order) {
            $orderMap[$order['order_number']] = $order['id'];
        }

        $materialMap = [];

        foreach ($materials as $material) {
            $materialMap[$material['material_code']] = $material['id'];
        }

        $data = [
            [
                'production_order_id' => $orderMap['PO-2026-0001'],
                'material_id' => $materialMap['MAT-001'],
                'planned_quantity' => 120,
                'actual_quantity' => 115,
            ],
            [
                'production_order_id' => $orderMap['PO-2026-0001'],
                'material_id' => $materialMap['MAT-002'],
                'planned_quantity' => 35,
                'actual_quantity' => 34,
            ],
            [
                'production_order_id' => $orderMap['PO-2026-0001'],
                'material_id' => $materialMap['MAT-003'],
                'planned_quantity' => 5,
                'actual_quantity' => 5,
            ],
            [
                'production_order_id' => $orderMap['PO-2026-0001'],
                'material_id' => $materialMap['MAT-004'],
                'planned_quantity' => 200,
                'actual_quantity' => 198,
            ],
            [
                'production_order_id' => $orderMap['PO-2026-0002'],
                'material_id' => $materialMap['MAT-001'],
                'planned_quantity' => 80,
                'actual_quantity' => 0,
            ],
            [
                'production_order_id' => $orderMap['PO-2026-0002'],
                'material_id' => $materialMap['MAT-005'],
                'planned_quantity' => 20,
                'actual_quantity' => 0,
            ],
            [
                'production_order_id' => $orderMap['PO-2026-0002'],
                'material_id' => $materialMap['MAT-006'],
                'planned_quantity' => 10,
                'actual_quantity' => 0,
            ],
            [
                'production_order_id' => $orderMap['PO-2026-0003'],
                'material_id' => $materialMap['MAT-001'],
                'planned_quantity' => 70,
                'actual_quantity' => 35,
            ],
            [
                'production_order_id' => $orderMap['PO-2026-0003'],
                'material_id' => $materialMap['MAT-002'],
                'planned_quantity' => 25,
                'actual_quantity' => 12,
            ],
            [
                'production_order_id' => $orderMap['PO-2026-0004'],
                'material_id' => $materialMap['MAT-007'],
                'planned_quantity' => 30,
                'actual_quantity' => 30,
            ],
            [
                'production_order_id' => $orderMap['PO-2026-0004'],
                'material_id' => $materialMap['MAT-008'],
                'planned_quantity' => 10,
                'actual_quantity' => 10,
            ],
        ];

        $this->db->table('production_order_items')->insertBatch($data);
    }
}
