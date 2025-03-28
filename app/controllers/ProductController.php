<?php
require_once __DIR__ . '/../models/ProductModel.php';

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function getProducts($category, $limit = null)
    {
        return $this->productModel->getProductsByCategory($category, $limit);
    }
    
    public function getSaleProducts()
    {
        return $this->productModel->getSaleProducts();
    }

    public function getProductById($id)
    {
        return $this->productModel->getProductById($id);
    }
}
