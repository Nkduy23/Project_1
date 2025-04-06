<?php

namespace App\Models;

class ProductModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getProducts($categoryName, $limit = null)
    {
        try {
            $sql = "SELECT p.MaSanPham, p.TenSanPham, p.HinhAnh, p.HinhAnhHover, p.DonGia, p.Nhan
        FROM SanPham p
        JOIN DanhMucSanPham c ON p.MaDanhMucSanPham = c.MaDanhMucSanPham
        WHERE c.TenDanhMucSanPham = ?
        ORDER BY p.MaSanPham ASC";

            if ($limit) {
                $sql .= " LIMIT " . (int)$limit;
            }

            $stmt = $this->db->prepare($sql);
            $stmt->execute([$categoryName]);
            $products = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if ($products) {
                foreach ($products as &$product) {
                    if (isset($product['MaSanPham'])) {
                        $product['Link'] = '/detail/' . $product['MaSanPham'];
                    } else {
                        $product['Link'] = '#';
                    }
                }
            }

            return $products ?: [];
        } catch (\Exception $e) {
            error_log("ProductModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function getSaleProducts()
    {
        try {
            $sql = "SELECT * FROM SanPham WHERE DangGiamGia = 1 ORDER BY MaSanPham ASC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $products = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if ($products) {
                foreach ($products as &$product) {
                    if (isset($product['MaSanPham'])) {
                        $product['Link'] = '/detail/' . $product['MaSanPham'];
                    } else {
                        $product['Link'] = '#';
                    }
                }
            }

            return $products ?: [];
        } catch (\Exception $e) {
            error_log("ProductModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function getProductById($id)
    {
        try {
            $sql = "SELECT MaSanPham, TenSanPham, MaDanhMucSanPham, MaDanhMucThuongHieu, HinhAnh, HinhAnhHover, DonGia, MoTa, Nhan 
            FROM SanPham WHERE MaSanPham = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("ProductModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function getProductDetails($id)
    {
        try {
            $sql = "SELECT TenThuocTinh, GiaTriThuocTinh FROM ChiTietSanPham WHERE MaSanPham = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            $productDetails = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $attributesAssoc = [];
            foreach ($productDetails as $detail) {
                $attributesAssoc[$detail['TenThuocTinh']] = $detail['GiaTriThuocTinh'];
            }

            return $attributesAssoc;
        } catch (\Exception $e) {
            error_log("ProductModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function getRelatedProducts($id)
    {
        try {
            $sql = "SELECT * FROM SanPham WHERE MaDanhMucSanPham = (SELECT MaDanhMucSanPham FROM SanPham WHERE MaSanPham = ?) AND MaSanPham != ? LiMIT 4";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id, $id]);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("ProductModel Error: " . $e->getMessage());
            return [];
        }
    }
}
