<?php

namespace App\Controllers;

use App\Models\SupplierModel; // MENGGABUNGKAN MODEL KE CONTROLLER

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SupplierController extends BaseController
{
    protected SupplierModel $supplierModel;
    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
    }
    public function index()
    {
        // MEMANGGIL
        $data = [
            'suppliers' => $this->supplierModel->findAll(),
        ];
        return view('suppliers/index', $data);
    }
    public function create()
    {
        return view('suppliers/create');
    }

    public function store()
    {
        $data = [
            'supplier_code' => trim($this->request->getPost('supplier_code')),
            'name' => trim($this->request->getPost('name')),
            'address' => trim($this->request->getPost('address')),
            'phone' => trim($this->request->getPost('phone')),
            'email' => trim($this->request->getPost('email')),
            'status' => trim($this->request->getPost('status')),
        ];

        if (!$this->supplierModel->insert($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->supplierModel->errors());
        }
        $data = [
            'supplier_code' => $this->request->getPost('supplier_code'),

            'name' => $this->request->getPost('name'),

            'address' => $this->request->getPost('address'),

            'phone' => $this->request->getPost('phone'),

            'email' => $this->request->getPost('email'),

            'status' => $this->request->getPost('status'),
        ];
        $this->supplierModel->insert($data);
        return 'Validation Berhasil';
    }
}
