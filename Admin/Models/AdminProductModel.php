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
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (\Exception $e) {
            error_log("AdminProductModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function updateProduct($data)
    {
        try {
            $sql = "UPDATE SanPham SET TenSanPham = ?, DonGia = ?, SoLuongTonKho = ?, TrangThai = ?, MoTa = ? WHERE MaSanPham = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$data['TenSanPham'], $data['DonGia'], $data['SoLuongTonKho'], $data['TrangThai'], $data['MoTa'], $data['id']]);
        } catch (\Exception $e) {
            error_log("AdminProductModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function deleteProduct($id)
    {
        try {
            $sql = "DELETE FROM SanPham WHERE MaSanPham = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$id]);
        } catch (\Exception $e) {
            error_log("AdminProductModel Error: " . $e->getMessage());
            return [];
        }
    }
}
