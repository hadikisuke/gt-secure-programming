<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('ProductSeeder');
        $this->call('MaterialSeeder');
        $this->call('SupplierSeeder');
        $this->call('ProductionOrderSeeder');
        $this->call('ProductionOrderItemSeeder');
        $this->call('InventoryTransactionSeeder');
        $this->call('FileUploadSeeder');
        $this->call('AuditLogSeeder');
    }
}
