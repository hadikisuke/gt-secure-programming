<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FileUploadSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'original_name' => 'production-spec-001.pdf',
                'stored_name' => 'a8f7c1-production-spec-001.pdf',
                'mime_type' => 'application/pdf',
                'file_size' => 245760,
                'storage_path' => 'production/2026/09/',
                'uploaded_by' => null,
                'related_type' => 'production_order',
                'related_id' => 1,
            ],
            [
                'original_name' => 'inspection-report-001.pdf',
                'stored_name' => 'c9a8d2-inspection-report-001.pdf',
                'mime_type' => 'application/pdf',
                'file_size' => 182340,
                'storage_path' => 'production/2026/09/',
                'uploaded_by' => null,
                'related_type' => 'production_order',
                'related_id' => 1,
            ],
        ];

        $this->db->table('file_uploads')->insertBatch($data);
    }
}
