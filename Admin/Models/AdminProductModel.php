<?php

namespace Admin\Models;

class AdminProductModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getAllProducts()
    {
        try {
            $sql = "SELECT * FROM SanPham";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (\Exception $e) {
            error_log("AdminProductModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function getProductById($id)
    {
        try {
            $sql = "SELECT * FROM SanPham WHERE MaSanPham = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (\Exception $e) {
            error_log("AdminProductModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function updateProduct($id, $name, $price, $stock, $status)
    {
        try {
            $sql = "UPDATE SanPham SET TenSanPham = ?, DonGia = ?, SoLuongTonKho = ?, TrangThai = ? WHERE MaSanPham = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$name, $price, $stock, $status, $id]);
            return true;
        } catch (\Exception $e) {
            error_log("AdminProductModel Error: " . $e->getMessage());
            return false;
        }
    }
}
