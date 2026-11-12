<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    // protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'supplier_code',
        'name',
        'address',
        'phone',
        'email',
        'status',
    ];

    // protected bool $allowEmptyInserts = false;
    // protected bool $updateOnlyChanged = true;

    // protected array $casts = [];
    // protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'supplier_code' =>
            'required|max_length[30]|regex_match[/^SUP-[0-9]{3}$/]|is_unique[suppliers.supplier_code]',
        'name' => 'required|max_length[150]|regex_match[/\S/]',
        'address' => 'permit_empty|max_length[255]',
        'phone' => 'permit_empty|max_length[30]|regex_match[/^62[0-9]+$/]',
        'email' => 'permit_empty|valid_email|max_length[150]',
        'status' => 'required|in_list[ACTIVE, INACTIVE]',
    ];
    protected $validationMessages = [
        'supplier_code' => [
            'required' => 'Supplier Code wajib diisi!',
            'max_length' => 'Supplier Code Maksimal 30 Karakter',
            'regex_match' =>
                'Supplier Code harus menggunakan format SUP-XXX, contoh SUP-001',
            'is_unique' => 'Supplier code sudah digunakan',
        ],
        'name' => [
            'required' => 'Nama supplier wajib diisi',
            'max_length' => 'Nama supplier maksimal 150 karakter',
            'regex_match' => 'Nama supplier tidak boleh hanya berisi spasi',
        ],
        'address' => [
            'max_length' => 'Alamat maksimal 255 karakter',
        ],
        'phone' => [
            'max_length' => 'Nomor telepon maksimal 30 karakter.',
            'regex_match' =>
                'Nomor telepon harus diawal 62 dan setelahnya hanya boleh angka',
        ],
        'email' => [
            'valid_email' => 'format email tidak valid.',
            'max_length' => 'email maksimal 150 karakter.',
        ],
    ];
    protected $skipValidation = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert = [];
    // protected $afterInsert = [];
    // protected $beforeUpdate = [];
    // protected $afterUpdate = [];
    // protected $beforeFind = [];
    // protected $afterFind = [];
    // protected $beforeDelete = [];
    // protected $afterDelete = [];
}
