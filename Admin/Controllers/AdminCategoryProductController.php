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
    
        if ($categoryId === 'DUPLICATE') {
            echo json_encode([
                'success' => false,
                'message' => 'Tên danh mục đã tồn tại, vui lòng chọn tên khác.'
            ]);
        } elseif ($categoryId) {
            $categoryById = $this->adminCategoryProductModel->getCategoryById($categoryId);
            echo json_encode([
                'success' => true,
                'data' => $categoryById,
                'message' => 'Thêm danh mục thành công'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Thêm danh mục thất bại'
            ]);
        }
    }
    

    public function get($id) {
        header('Content-Type: application/json');
        $categoryById = $this->adminCategoryProductModel->getCategoryById($id);
        if ($categoryById) {
            echo json_encode([
                'success' => true,
                'data' => $categoryById,
                'message' => 'Lấy danh mục thành công'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Lấy danh mục thất bại'
            ]);
        }
    }

    public function update($data) {
        header('Content-Type: application/json');
        $result = $this->adminCategoryProductModel->updateCategory($data);
        if ($result) {
            echo json_encode([                
                'success' => true,
                'data' => $result,
                'message' => 'Cập nhật danh mục thành công'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'product_id' => false,
                'message' => 'Cập nhật danh mục thất bại'
            ]);
        }
    }

    public function delete($id) {
        header('Content-Type: application/json');
        $result = $this->adminCategoryProductModel->deleteCategory($id);
        if ($result) {
            echo json_encode([
                'success' => true,
                'message' => 'Xóa danh mục thành công'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Xóa danh mục thất bại'
            ]);
        }
    }
}
