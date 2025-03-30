<?php
require_once __DIR__ . '/../models/CartModel.php';

class CartController
{
    private $cartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
    }

    public function getCartQuantity()
    {
        $cartCount = 0;

        // Nếu user đã đăng nhập, lấy số lượng sản phẩm từ database
        if (isset($_SESSION['user'])) {
            $cartCount = $this->cartModel->getTotalCartQuantity($_SESSION['user']['id']);
        } 
        // Nếu user chưa đăng nhập, lấy số lượng sản phẩm từ session
        else {
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

                // ✅ Đẩy giỏ hàng vào database nếu đã đăng nhập
                $this->cartModel->addToCart($user_id, $product_id, $quantity);
            } else {
                // ✅ Nếu chưa đăng nhập, lưu vào SESSION
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                if (isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id]['quantity'] += 1;
                } else {
                    $_SESSION['cart'][$product_id] = [
                        'name' => $product_name,
                        'price' => $product_price,
                        'image' => $product_image,
                        'quantity' => 1
                    ];
                }
            }

            // ✅ Chuyển hướng về trang giỏ hàng
            header('Location: /cart');
            exit();
        }
    }
}
