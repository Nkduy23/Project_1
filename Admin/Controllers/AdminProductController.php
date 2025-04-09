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
}
