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

    public function create($data)
    {
        header('Content-Type: application/json');

        $productId = $this->adminProductModel->createProduct($data);

        if ($productId) {
            $productById = $this->adminProductModel->getProductById($productId);
            echo json_encode([
                'success' => true,
                'data' => $productById,
                'message' => 'Tạo sản phẩm thành công'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'product_id' => false,
                'message' => 'Tạo sản phẩm thất bại'
            ]);
        }
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

        $productId = $this->adminProductModel->updateProduct($data);

        if ($productId) {
            $productById = $this->adminProductModel->getProductById($productId);
            echo json_encode([
                'success' => true,
                'data' => $productById,
                'message' => 'Sửa sản phẩm thành công'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'product_id' => false,
                'message' => 'Sửa sản phẩm thất bại'
            ]);
        }
    }

    public function delete($id)
    {
        $product = $this->adminProductModel->getProductById($id);

        if (!$product) {
            return false;
        }
        $mainImagePath = __DIR__ . '/../../Public/assets/img/product/' . $product['HinhAnh'];
        if (file_exists($mainImagePath)) {
            unlink($mainImagePath);
        }

        if (!empty($product['HinhAnhHover'])) {
            $hoverImagePath = __DIR__ . '/../../Public/assets/img/product/' . $product['HinhAnhHover'];
            if (file_exists($hoverImagePath)) {
                unlink($hoverImagePath);
            }
        }
        return $this->adminProductModel->deleteProduct($id);
    }
}
