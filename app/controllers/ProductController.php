<?php

namespace App\Controllers;

class ProductController
{
    private $productModel;
    private $commentModel;

    public function __construct(
        $productModel,
        $commentModel
    ) {
        $this->productModel = $productModel;
        $this->commentModel = $commentModel;
    }

    public function getProducts($category, $limit = null)
    {
        return $this->productModel->getProducts($category, $limit);
    }

    public function showProductsByType($type)
    {
        $products = $this->productModel->getProducts($type);

        require_once __DIR__ . '/../Views/components/breadcrumb.php';

        if ($type == 'male') {
            require_once __DIR__ . '/../Views/pages/male.php';
        } elseif ($type == 'female') {
            require_once __DIR__ . '/../Views/pages/female.php';
        } elseif ($type == 'couple') {
            require_once __DIR__ . '/../Views/pages/couple.php';
        } elseif ($type == 'jewelry') {
            require_once __DIR__ . '/../Views/pages/jewelry.php';
        } elseif ($type == 'accessories') {
            require_once __DIR__ . '/../Views/pages/accessories.php';
            // } elseif ($type == 'sale') {
            //     require_once __DIR__ . '/../Views/pages/sale.php';
        } else {
            require_once __DIR__ . '/../Views/404.php';
        }
    }

    public function getSaleProducts()
    {
        return $this->productModel->getSaleProducts();
    }

    public function getRelatedProducts()
    {
        return $this->productModel->getRelatedProducts();
    }

    public function getProductById($id)
    {
        $productDetail =  $this->productModel->getProductById($id);
        $attributes = $this->productModel->getProductDetails($id);
        $relatedProducts = $this->productModel->getRelatedProducts($id);
        $comments = $this->commentModel->getComments($id);
        require_once __DIR__ . '/../Views/components/breadcrumb.php';
        require_once __DIR__ . '/../Views/pages/detail.php';
    }
}
