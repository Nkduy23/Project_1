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
        header('Content-Type: application/json');
        $product = $this->adminProductModel->getProductById($id);
        echo json_encode($product);
    }

    public function update($data)
    {
        header('Content-Type: application/json');

        $result = $this->adminProductModel->updateProduct($data);

        echo json_encode([
            'success' => true,
            'data' => $result
        ]);
    }

    public function delete($id)
    {
        $result = $this->adminProductModel->deleteProduct($id);
        return $result;
    }
}
