<?php

namespace Admin\Controllers;

class AdminProductController
{

    private $adminProductModel;

    public function __construct($adminProductModel)
    {
        $this->adminProductModel = $adminProductModel;
    }

    public function index()
    {
        $products = $this->adminProductModel->getAllProducts();
        require_once __DIR__ . '/../Views/products.php';
    }

    public function get($id)
    {
        $product = $this->adminProductModel->getProductById($id);
        header('Content-Type: application/json');
        echo json_encode($product);
    }

    public function update($data)
    {
        $result = $this->adminProductModel->updateProduct($data);
        header('Content-Type: application/json');
        echo json_encode(['success' => $result]); // 👈 wrap kết quả trong mảng
    }

    public function delete($id)
    {
        $result = $this->adminProductModel->deleteProduct($id);
        return $result;
    }
    
}
