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

    public function createProduct($data)
    {
        try {
            $sql = "INSERT INTO SanPham (
                        TenSanPham, DonGia, GiaGiam, SoLuongTonKho,
                        TrangThai, MoTa, HinhAnh, HinhAnhHover,
                        DangGiamGia, Nhan, MaDanhMucSanPham, MaDanhMucThuongHieu
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                $data['TenSanPham'] ?? '',
                $data['DonGia'] ?? 0,
                $data['GiaGiam'] ?? 0,
                $data['SoLuongTonKho'] ?? 0,
                $data['TrangThai'] ?? 1,
                $data['MoTa'] ?? '',
                $data['HinhAnh'] ?? null,
                $data['HinhAnhHover'] ?? null,
                $data['DangGiamGia'] ?? 0,
                $data['Nhan'] ?? '',
                $data['MaDanhMucSanPham'] ?? null,
                $data['MaDanhMucThuongHieu'] ?? null
            ]);

            return $this->db->lastInsertId(); // trả về ID sản phẩm mới
        } catch (\Exception $e) {
            error_log("createProduct Error: " . $e->getMessage());
            return false;
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
            if (!empty($data['HinhAnh'])) {
                $sql = "UPDATE SanPham 
                        SET TenSanPham = ?, DonGia = ?, SoLuongTonKho = ?, TrangThai = ?, MoTa = ?, HinhAnh = ? 
                        WHERE MaSanPham = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    $data['TenSanPham'],
                    $data['DonGia'],
                    $data['SoLuongTonKho'],
                    $data['TrangThai'],
                    $data['MoTa'],
                    $data['HinhAnh'],
                    $data['id']
                ]);
            } else {
                $sql = "UPDATE SanPham 
                        SET TenSanPham = ?, DonGia = ?, SoLuongTonKho = ?, TrangThai = ?, MoTa = ? 
                        WHERE MaSanPham = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    $data['TenSanPham'],
                    $data['DonGia'],
                    $data['SoLuongTonKho'],
                    $data['TrangThai'],
                    $data['MoTa'],
                    $data['id']
                ]);
            }

            // ✅ Lấy lại sản phẩm sau khi update
            $selectStmt = $this->db->prepare("SELECT * FROM SanPham WHERE MaSanPham = ?");
            $selectStmt->execute([$data['id']]);
            return $selectStmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("AdminProductModel Error: " . $e->getMessage());
            return false;
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
