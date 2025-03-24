<?php
require_once __DIR__ . '/../models/ProductModel.php';

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function getProducts($category)
    {
        return $this->productModel->getProductsByCategory($category);
    }

    public function getSaleProducts()
    {
        return $this->productModel->getSaleProducts();
    }
}
