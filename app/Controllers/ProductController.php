<?php

namespace App\Controllers;

use App\Models\ProductModel; // MENGGABUNGKAN MODEL KE CONTROLLER

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProductController extends BaseController
{
    protected ProductModel $productModel;
    public function __construct()
    {
        $this->productModel = new ProductModel();
    }
    public function index()
    {
        // MEMANGGIL
        $data = [
            'products' => $this->productModel->findAll(),
        ];
        return view('products/index', $data);
    }
    public function create()
    {
        return view('products/create');
    }

    public function store()
    {
        $rules = [
            'product_code' =>
                'required|max_length[10]|regex_match[/^P-[0-9]{3}$/]|is_unique[products.product_code]',
            'name' => 'required|max_length[50]',
            'description' => 'permit_empty',
            'unit' => 'required|in_list[pcs]',
            'minimum_stock' => 'required|decimal|greater_than_equal_to[0]',
            'status' => 'required|in_list[ACTIVE, INACTIVE]',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'product_code'  => $this->request->getPost('product_code'),
            'name'          => $this->request->getPost('name'),
            'description'   => $this->request->getPost('description'),
            'unit'          => $this->request->getPost('unit'),
            'minimum_stock' => $this->request->getPost('minimum_stock'),
            'status'        => $this->request->getPost('status'),
        ];

        $this->productModel->insert($data);

        return redirect()->to(('/products'));
    }
    public function searchVulnarable()
    {
        $keyword = $this->request->getGet('q');
        $db = db_connect();
        $sql = "SELECT * FROM products WHERE name LIKE '%$keyword%'";
        $query = $db->query($sql);
        return $this->response->setJSON($query->getResult());
    }
    public function searchSave()
    {
        $keyword = $this->request->getGet('q');
        $db = db_connect();
        $builder = $db->table('products');
        $builder->like('name', $keyword);
        $query = $builder->get();
        return $this->response->setJSON($query->getResult());
    }
    public function searchPrepared()
    {
        $keyword = $this->request->getGet('q');
        $db = db_connect();
        $sql = 'SELECT * FROM products WHERE name LIKE ?';
        $query = $db->query($sql, ["%($keyword)%"]);
        return $this->response->setJSON($query->getResult());
    }

    public function search()
    {
        $keyword = $this->request->getGet('q');
        return view('products/search', ['keyword' => $keyword]);
    }

    public function domXss()
    {
        return view('products/dom_xss');        
    }
}
