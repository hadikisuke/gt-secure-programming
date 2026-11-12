<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class MaterialSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'material_code' => 'MAT-001',
                'name' => 'Natural Rubber',
                'description' => 'Natural rubber compound',
                'unit' => 'kg',
                'minimum_stock' => 500,
                'status' => 'ACTIVE',
            ],
            [
                'material_code' => 'MAT-002',
                'name' => 'Carbon Black',
                'description' => 'Carbon black material',
                'unit' => 'kg',
                'minimum_stock' => 250,
                'status' => 'ACTIVE',
            ],
            [
                'material_code' => 'MAT-003',
                'name' => 'Sulfur',
                'description' => 'Sulfur material',
                'unit' => 'kg',
                'minimum_stock' => 100,
                'status' => 'ACTIVE',
            ],
            [
                'material_code' => 'MAT-004',
                'name' => 'Steel Cord',
                'description' => 'Steel cord for tire reinforcement',
                'unit' => 'meter',
                'minimum_stock' => 1000,
                'status' => 'ACTIVE',
            ],
            [
                'material_code' => 'MAT-005',
                'name' => 'Silica',
                'description' => 'Silica filler',
                'unit' => 'kg',
                'minimum_stock' => 150,
                'status' => 'ACTIVE',
            ],
            [
                'material_code' => 'MAT-006',
                'name' => 'Zinc Oxide',
                'description' => 'Zinc oxide',
                'unit' => 'kg',
                'minimum_stock' => 50,
                'status' => 'ACTIVE',
            ],
            [
                'material_code' => 'MAT-007',
                'name' => 'Plasticizer',
                'description' => 'Rubber plasticizer',
                'unit' => 'kg',
                'minimum_stock' => 100,
                'status' => 'ACTIVE',
            ],
            [
                'material_code' => 'MAT-008',
                'name' => 'Resin',
                'description' => 'Resin additive',
                'unit' => 'kg',
                'minimum_stock' => 100,
                'status' => 'ACTIVE',
            ],
            [
                'material_code' => 'MAT-009',
                'name' => 'Antioxidant',
                'description' => 'Antioxidant additive',
                'unit' => 'kg',
                'minimum_stock' => 50,
                'status' => 'ACTIVE',
            ],
            [
                'material_code' => 'MAT-010',
                'name' => 'Textile Cord',
                'description' => 'Textile reinforcement material',
                'unit' => 'meter',
                'minimum_stock' => 1000,
                'status' => 'ACTIVE',
            ],
            [
                'material_code' => 'MAT-011',
                'name' => 'Bead Wire',
                'description' => 'Bead wire',
                'unit' => 'meter',
                'minimum_stock' => 1000,
                'status' => 'ACTIVE',
            ],
            [
                'material_code' => 'MAT-012',
                'name' => 'Process Oil',
                'description' => 'Process oil',
                'unit' => 'liter',
                'minimum_stock' => 100,
                'status' => 'ACTIVE',
            ],
            [
                'material_code' => 'MAT-013',
                'name' => 'Wax',
                'description' => 'Rubber processing wax',
                'unit' => 'kg',
                'minimum_stock' => 50,
                'status' => 'ACTIVE',
            ],
            [
                'material_code' => 'MAT-014',
                'name' => 'Adhesive',
                'description' => 'Adhesive compound',
                'unit' => 'kg',
                'minimum_stock' => 50,
                'status' => 'ACTIVE',
            ],
            [
                'material_code' => 'MAT-015',
                'name' => 'Color Pigment',
                'description' => 'Color pigment',
                'unit' => 'kg',
                'minimum_stock' => 25,
                'status' => 'ACTIVE',
            ],
        ];

        $this->db->table('materials')->insertBatch($data);
    }
}
