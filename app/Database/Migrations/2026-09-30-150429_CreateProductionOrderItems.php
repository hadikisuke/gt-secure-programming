<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateProductionOrderItems extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'production_order_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'material_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'planned_quantity' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
                'default' => 0,
            ],
            'actual_quantity' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
                'default' => 0,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey(['production_order_id', 'material_id']);
        $this->forge->addForeignKey(
            'production_order_id',
            'production_orders',
            'id',
            'CASCADE',
            'CASCADE',
        );
        $this->forge->addForeignKey(
            'material_id',
            'materials',
            'id',
            'RESTRICT',
            'RESTRICT',
        );
        $this->forge->createTable('production_order_items', true);
    }

    public function down()
    {
        $this->forge->dropTable('production_order_items', true);
    }
}
