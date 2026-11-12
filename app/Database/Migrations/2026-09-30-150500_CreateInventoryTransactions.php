<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateInventoryTransactions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'transaction_code' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
            ],
            'material_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'quantity' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
            ],
            'reference_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'reference_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'null' => true,
            ],
            'notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_by' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('transaction_code');
        $this->forge->addKey('material_id');
        $this->forge->addKey('created_by');
        $this->forge->addKey(['reference_type', 'reference_id']);
        $this->forge->addForeignKey(
            'material_id',
            'materials',
            'id',
            'RESTRICT',
            'RESTRICT',
        );
        $this->forge->createTable('inventory_transactions', true);
    }

    public function down()
    {
        $this->forge->dropTable('inventory_transactions', true);
    }
}
