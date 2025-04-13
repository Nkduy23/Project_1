<?php

namespace Admin\Controllers;

class AdminCategoryProductController
{
    private $adminCategoryProductModel;

    public function __construct($adminCategoryProductModel)
    {
        $this->adminCategoryProductModel = $adminCategoryProductModel;
    }

    public function index()
    {
        $categories = $this->adminCategoryProductModel->getAllCategories();
        require_once __DIR__ . '/../Views/categoriesProduct.php';
    }

    public function create($data)
    {
        header('Content-Type: application/json');

        $categoryId = $this->adminCategoryProductModel->createCategory($data);

        if ($categoryId) {
            $categoryId = $this->adminCategoryProductModel->getCategoryById($categoryId);
            echo json_encode([
                'success' => true,
                'data' => $categoryId,
                'message' => 'Thêm danh mục thành công'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Thêm danh mục thất bại'
            ]);
        }
    }
}
