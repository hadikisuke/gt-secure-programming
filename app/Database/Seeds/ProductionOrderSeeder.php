<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class ProductionOrderSeeder extends Seeder
{
    public function run()
    {
        $products = $this->db
            ->table('products')
            ->select('id, product_code')
            ->get()
            ->getResultArray();
        $productMap = [];
        foreach ($products as $product) {
            $productMap[$product['product_code']] = $product['id'];
        }
        $data = [
            [
                'order_number' => 'PO-2026-0001',
                'product_id' => $productMap['P-001'],
                'planned_quantity' => 500,
                'actual_quantity' => 480,
                'scheduled_date' => '2026-09-01',
                'status' => 'COMPLETED',
                'created_by' => null,
                'approved_by' => null,
            ],
            [
                'order_number' => 'PO-2026-0002',
                'product_id' => $productMap['P-002'],
                'planned_quantity' => 300,
                'actual_quantity' => 0,
                'scheduled_date' => '2026-09-03',
                'status' => 'SUBMITTED',
                'created_by' => null,
                'approved_by' => null,
            ],
            [
                'order_number' => 'PO-2026-0003',
                'product_id' => $productMap['P-003'],
                'planned_quantity' => 250,
                'actual_quantity' => 120,
                'scheduled_date' => '2026-09-05',
                'status' => 'IN_PROGRESS',
                'created_by' => null,
                'approved_by' => null,
            ],
            [
                'order_number' => 'PO-2026-0004',
                'product_id' => $productMap['P-004'],
                'planned_quantity' => 200,
                'actual_quantity' => 200,
                'scheduled_date' => '2026-09-06',
                'status' => 'COMPLETED',
                'created_by' => null,
                'approved_by' => null,
            ],
            [
                'order_number' => 'PO-2026-0005',
                'product_id' => $productMap['P-005'],
                'planned_quantity' => 150,
                'actual_quantity' => 0,
                'scheduled_date' => '2026-09-08',
                'status' => 'DRAFT',
                'created_by' => null,
                'approved_by' => null,
            ],
            [
                'order_number' => 'PO-2026-0006',
                'product_id' => $productMap['P-006'],
                'planned_quantity' => 350,
                'actual_quantity' => 300,
                'scheduled_date' => '2026-09-10',
                'status' => 'IN_PROGRESS',
                'created_by' => null,
                'approved_by' => null,
            ],
            [
                'order_number' => 'PO-2026-0007',
                'product_id' => $productMap['P-007'],
                'planned_quantity' => 200,
                'actual_quantity' => 0,
                'scheduled_date' => '2026-09-12',
                'status' => 'APPROVED',
                'created_by' => null,
                'approved_by' => null,
            ],
            [
                'order_number' => 'PO-2026-0008',
                'product_id' => $productMap['P-008'],
                'planned_quantity' => 180,
                'actual_quantity' => 180,
                'scheduled_date' => '2026-09-13',
                'status' => 'COMPLETED',
                'created_by' => null,
                'approved_by' => null,
            ],
            [
                'order_number' => 'PO-2026-0009',
                'product_id' => $productMap['P-009'],
                'planned_quantity' => 220,
                'actual_quantity' => 0,
                'scheduled_date' => '2026-09-15',
                'status' => 'SUBMITTED',
                'created_by' => null,
                'approved_by' => null,
            ],
            [
                'order_number' => 'PO-2026-0010',
                'product_id' => $productMap['P-010'],
                'planned_quantity' => 170,
                'actual_quantity' => 100,
                'scheduled_date' => '2026-09-18',
                'status' => 'IN_PROGRESS',
                'created_by' => null,
                'approved_by' => null,
            ],
        ];

        $this->db->table('production_orders')->insertBatch($data);
    }
}
