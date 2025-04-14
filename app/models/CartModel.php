<?php

namespace App\Models;

class CartModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUserCart($userId)
    {
        try {
            $sql = "SELECT c.*, p.TenSanPham, p.DonGia, p.HinhAnh 
    FROM GioHang c 
    JOIN SanPham p ON c.MaSanPham = p.MaSanPham
    WHERE c.MaTaiKhoan = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$userId]);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("CartModel Error: " . $e->getMessage());
        }
    }

    public function addToCart($userId, $productId, $product_quantity, $product_size)
    {
        try {
            $sql = "SELECT * FROM GioHang WHERE MaTaiKhoan = ? AND MaSanPham = ? AND KichThuoc = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$userId, $productId, $product_size]);
            $cartItem = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($cartItem) {
                $updateSql = "UPDATE GioHang SET SoLuong = SoLuong + ? WHERE MaTaiKhoan = ? AND MaSanPham = ? AND KichThuoc = ?";
                $stmt = $this->db->prepare($updateSql);
                return $stmt->execute([$product_quantity, $userId, $productId, $product_size]);
            } else {
                $insertSql = "INSERT INTO GioHang (MaTaiKhoan, MaSanPham, SoLuong, KichThuoc) VALUES (?, ?, ?, ?)";
                $stmt = $this->db->prepare($insertSql);
                return $stmt->execute([$userId, $productId, $product_quantity, $product_size]);
            }
        } catch (\Exception $e) {
            error_log("CartModel Error: " . $e->getMessage());
        }
    }

    public function getTotalCartQuantity($userId)
    {
        try {
            $sql = "SELECT SUM(SoLuong) as total FROM GioHang WHERE MaTaiKhoan = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$userId]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result['total'] ?? 0;
        } catch (\Exception $e) {
            error_log("CartModel Error: " . $e->getMessage());
        }
    }

    public function removeFromCart($user_id, $product_id)
    {
        try {
            $sql = "DELETE FROM GioHang WHERE MaTaiKhoan = ? AND MaGioHang = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$user_id, $product_id]);
        } catch (\Exception $e) {
            error_log("CartModel Error: " . $e->getMessage());
        }
    }

    public function updateCart($user_id, $product_id, $product_quantity, $product_size)
    {
        try {
            $sql = "UPDATE GioHang SET SoLuong = ?, KichThuoc = ? WHERE MaTaiKhoan = ? AND MaGioHang = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$product_quantity, $product_size, $user_id, $product_id]);
        } catch (\Exception $e) {
            error_log("CartModel Error: " . $e->getMessage());
        }
    }

    public function getCartItems($userId)
    {
        try {
            $sql = "SELECT g.*, p.TenSanPham, p.DonGia, p.HinhAnh 
    FROM GioHang g 
    JOIN SanPham p ON g.MaSanPham = p.MaSanPham 
    WHERE g.MaTaiKhoan = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$userId]);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("CartModel Error: " . $e->getMessage());
        }
    }

    // Bắt đầu một giao dịch (transaction).
    // Chèn dữ liệu đơn hàng vào bảng DonHang.
    // Chèn chi tiết đơn hàng vào bảng DonHangChiTiet cho mỗi sản phẩm trong giỏ hàng.
    // Nếu tất cả các thao tác thành công, commit giao dịch và trả về ID đơn hàng.
    // Nếu có lỗi xảy ra, rollback toàn bộ giao dịch để đảm bảo tính nhất quán của dữ liệu.

    public function createOrder($orderData, $cartItems)
    {
        // Bắt đầu transaction
        $this->db->beginTransaction();

        try {
            // 1. Tạo đơn hàng chính
            $sql = "INSERT INTO DonHang (
                MaTaiKhoan, 
                DiaChiNhanHang, 
                ThanhPho, 
                TongTien, 
                PhuongThucThanhToan,
                TrangThai
            ) VALUES (?, ?, ?, ?, ?, 0)";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                $orderData['MaTaiKhoan'],
                $orderData['DiaChiNhanHang'],
                $orderData['ThanhPho'],
                $orderData['TongTien'],
                $orderData['PhuongThucThanhToan']
            ]);

            $orderId = $this->db->lastInsertId();

            // 2. Thêm chi tiết đơn hàng (nếu có bảng DonHangChiTiet)
            foreach ($orderData['selected_items'] as $productId) {
                // Tìm sản phẩm trong giỏ hàng
                $item = null;
                foreach ($cartItems as $cartItem) {
                    if ($cartItem['MaSanPham'] == $productId) {
                        $item = $cartItem;
                        break;
                    }
                }

                if ($item) {
                    $detailSql = "INSERT INTO DonHangChiTiet (
                        MaDonHang, 
                        MaSanPham, 
                        TenSanPham,
                        SoLuong, 
                        KichThuoc, 
                        DonGia
                    ) VALUES (?, ?, ?, ?, ?, ?)";

                    $detailStmt = $this->db->prepare($detailSql);
                    $detailStmt->execute([
                        $orderId,
                        $item['MaSanPham'],
                        $item['TenSanPham'],
                        $item['SoLuong'],
                        $item['KichThuoc'],
                        $item['DonGia']
                    ]);
                }
            }

            // Commit transaction
            $this->db->commit();
            return $orderId;
        } catch (\Exception $e) {
            // Rollback nếu có lỗi
            $this->db->rollBack();
            throw $e;
        }
    }

    public function getCartItemByUser($userId)
    {
        $sql = "SELECT 
                    g.MaSanPham, 
                    p.TenSanPham, 
                    p.DonGia, 
                    p.HinhAnh,
                    g.SoLuong,
                    g.KichThuoc
                FROM GioHang g
                JOIN SanPham p ON g.MaSanPham = p.MaSanPham
                WHERE g.MaTaiKhoan = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteCartItem($userId, $productId)
    {
        $sql = "DELETE FROM GioHang WHERE MaTaiKhoan = ? AND MaSanPham = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$userId, $productId]);
    }
}
