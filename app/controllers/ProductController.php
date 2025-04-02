<?php

namespace App\Controllers;

class ProductController
{
    private $productModel;

    public function __construct(
        $productModel,
    ) {
        $this->productModel = $productModel;
    }
    public function getProducts($category, $limit = null)
    {
        return $this->productModel->getProducts($category, $limit);
    }

    public function showProductsByType($type)
    {
        $products = $this->productModel->getProducts($type);

        require_once __DIR__ . '/../views/components/breadcrumb.php';

        if ($type == 'male') {
            require_once __DIR__ . '/../views/pages/male.php';
        } elseif ($type == 'female') {
            require_once __DIR__ . '/../views/pages/female.php';
        } elseif ($type == 'couple') {
            require_once __DIR__ . '/../views/pages/couple.php';
        } elseif ($type == 'jewelry') {
            require_once __DIR__ . '/../views/pages/jewelry.php';
        } elseif ($type == 'accessories') {
            require_once __DIR__ . '/../views/pages/accessories.php';
        // } elseif ($type == 'sale') {
        //     require_once __DIR__ . '/../views/pages/sale.php';
        } else {
            require_once __DIR__ . '/../views/404.php';
        }
    }

    public function getSaleProducts()
    {
        return $this->productModel->getSaleProducts();
    }

    public function getProductById($id)
    {
        $details =  $this->productModel->getProductById($id);

        // echo '<pre>';
        // var_dump($details);
        // die();

        require_once __DIR__ . '/../views/components/breadcrumb.php';
        require_once __DIR__ . '/../views/pages/detail.php';
    }

    public function getProductDetails($id)
    {
        return $this->productModel->getProductDetails($id);
    }
}
