<?php

namespace Admin\Models;

class AdminCategoryProductModel
{

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getAllCategories()
    {
        try {
            $sql = "SELECT * FROM DanhMucSanPham";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (\Exception $e) {
            error_log("AdminCategoryProductModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function createCategory($data)
    {
        try {
            $sql = "INSERT INTO DanhMucSanPham (TenDanhMucSanPham, MoTaDanhMuc, TrangThai) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                $data['TenDanhMucSanPham'],
                $data['MoTaDanhMuc'],
                $data['TrangThai']
            ]);
            return $this->db->lastInsertId();
        } catch (\PDOException $e) {
            if ($e->errorInfo[1] == 1062) { // mã lỗi 1062 là trùng UNIQUE
                return 'DUPLICATE';
            }
    
            error_log("AdminCategoryProductModel Error: " . $e->getMessage());
            return false;
        }
    }
    

    public function getCategoryById($id)
    {
        try {
            $sql = "SELECT * FROM DanhMucSanPham WHERE MaDanhMucSanPham = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (\Exception $e) {
            error_log("AdminCategoryProductModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function updateCategory($data)
    {
        try {
            $sql = "UPDATE DanhMucSanPham SET TenDanhMucSanPham = ?, MoTaDanhMuc = ?, TrangThai = ? WHERE MaDanhMucSanPham = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                $data['TenDanhMucSanPham'],
                $data['MoTaDanhMuc'],
                $data['TrangThai'],
                $data['MaDanhMucSanPham']
            ]);
            $selectStmt = $this->db->prepare("SELECT * FROM DanhMucSanPham WHERE MaDanhMucSanPham = ?");
            $selectStmt->execute([$data['MaDanhMucSanPham']]);
            $result = $selectStmt->fetch(\PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (\Exception $e) {
            error_log("AdminCategoryProductModel Error: " . $e->getMessage());
            return false;
        }
    }

    public function deleteCategory($id)
    {
        try {
            $sql = "DELETE FROM DanhMucSanPham WHERE MaDanhMucSanPham = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$id]);
        } catch (\Exception $e) {
            error_log("AdminCategoryProductModel Error: " . $e->getMessage());
            return false;
        }
    }
}
