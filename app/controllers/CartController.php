<?php

namespace App\Controllers;

class CartController
{
    private $cartModel;

    public function __construct(
        $cartModel
    ) {
        $this->cartModel = $cartModel;
    }

    public function showCart()
    {
        $cartItems = $this->getCartItems();
        require_once __DIR__ . '/../views/pages/cart.php';
    }

    private function getCartItems()
    {
        if (isset($_SESSION['user'])) {
            return $this->cartModel->getUserCart($_SESSION['user']['id']);
        }
        return $_SESSION['cart'] ?? [];
    }

    public function getCartQuantity()
    {
        $cartCount = 0;
        if (isset($_SESSION['user'])) {
            $cartCount = $this->cartModel->getTotalCartQuantity($_SESSION['user']['id']);
        } else {
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    $cartCount += $item['quantity'];
                }
            }
        }

        return $cartCount;
    }

    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $quantity = 1; // Mặc định số lượng là 1

            if (isset($_SESSION['user'])) {
                $user_id = $_SESSION['user']['id'];
                $this->cartModel->addToCart($user_id, $product_id, $quantity);
            } else {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                if (isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id]['quantity'] += 1;
                } else {
                    $_SESSION['cart'][$product_id] = [
                        'id' => $product_id,
                        'name' => $product_name,
                        'price' => $product_price,
                        'image' => $product_image,
                        'quantity' => 1
                    ];
                }
            }
            header('Location: /cart');
        }
    }

    public function removeFromCart($productId)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['user'])) {
            $this->cartModel->removeFromCart($_SESSION['user']['id'], $productId);
        } elseif (isset($_SESSION['cart'][$productId])) {
            if ($_SESSION['cart'][$productId]['quantity'] > 1) {
                $_SESSION['cart'][$productId]['quantity'] -= 1;
        } else {
                unset($_SESSION['cart'][$productId]);
            }
        }

        header('Location: /cart');
        exit;
    }
}
