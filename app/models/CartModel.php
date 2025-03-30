<?php
require_once __DIR__ . '/CallDatabase.php';

class CartModel extends CallDatabase
{
    public function addToCart($userId, $productId, $quantity)
    {
        // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
        $sql = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
        $cartItem = $this->db->getOne($sql, [$userId, $productId]);

        if ($cartItem) {
            // ✅ Nếu sản phẩm đã có → Cập nhật số lượng
            $updateSql = "UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?";
            return $this->db->execute($updateSql, [$quantity, $userId, $productId]);
        } else {
            // ✅ Nếu chưa có → Thêm mới
            $insertSql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
            return $this->db->execute($insertSql, [$userId, $productId, $quantity]);
        }
    }

    public function getTotalCartQuantity($userId)
    {
        $sql = "SELECT SUM(quantity) as total FROM cart WHERE user_id = ?";
        $result = $this->db->getOne($sql, [$userId]);
        return $result['total'] ?? 0;
    }
}
