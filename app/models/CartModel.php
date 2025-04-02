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
        $sql = "SELECT c.*, p.name, p.price, p.image 
                FROM cart c 
                JOIN products p ON c.product_id = p.id 
                WHERE c.user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addToCart($userId, $productId, $quantity)
    {
        $sql = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId, $productId]);
        $cartItem = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($cartItem) {
            $updateSql = "UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?";
            $stmt = $this->db->prepare($updateSql);
            return $stmt->execute([$quantity, $userId, $productId]);
        } else {
            $insertSql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($insertSql);
            return $stmt->execute([$userId, $productId, $quantity]);
        }
    }

    public function getTotalCartQuantity($userId)
    {
        $sql = "SELECT SUM(quantity) as total FROM cart WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    public function removeFromCart($user_id, $product_id)
    {
        $sql = "DELETE FROM cart WHERE user_id = ? AND id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$user_id, $product_id]);
    }
}
