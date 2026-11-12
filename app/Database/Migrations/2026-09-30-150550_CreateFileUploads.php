<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateFileUploads extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'original_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'stored_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'mime_type' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'file_size' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'storage_path' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
            ],
            'uploaded_by' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'null' => true,
            ],
            'related_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'related_id' => [
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
        $this->forge->addKey('uploaded_by');
        $this->forge->addKey(['related_type', 'related_id']);
        $this->forge->createTable('file_uploads', true);
    }

    public function down()
    {
        $this->forge->dropTable('file_uploads', true);
    }
}
