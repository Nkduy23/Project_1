<?php
class Cart {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addToCart($userId, $productId, $quantity) {
        $sql = "INSERT INTO cart (user_id, product_id, quantity) 
                VALUES (?, ?, ?) 
                ON DUPLICATE KEY UPDATE quantity = quantity + ?";
        $this->db->execute($sql, [$userId, $productId, $quantity, $quantity]);
    }

    public function syncLocalCart($userId, $localCart) {
        foreach ($localCart as $productId => $quantity) {
            $this->addToCart($userId, $productId, $quantity);
        }
    }

    public function getCartItems($userId) {
        $sql = "SELECT products.id, products.name, products.price, cart.quantity 
                FROM cart 
                JOIN products ON cart.product_id = products.id 
                WHERE cart.user_id = ?";
        return $this->db->fetchAll($sql, [$userId]);
    }

    public function clearCart($userId) {
        $sql = "DELETE FROM cart WHERE user_id = ?";
        $this->db->execute($sql, [$userId]);
    }
}
?>
