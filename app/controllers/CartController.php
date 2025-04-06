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
        return $cartItems;
    }

    private function getCartItems()
    {
        if (isset($_SESSION['user'])) {
            return $this->cartModel->getUserCart($_SESSION['user']['MaKhachHang']);
        }
        return $_SESSION['cart'] ?? [];
    }

    public function getCartQuantity()
    {
        $cartCount = 0;
        if (isset($_SESSION['user'])) {
            $cartCount = $this->cartModel->getTotalCartQuantity($_SESSION['user']['MaKhachHang']);
        } else {
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    $cartCount += $item['SoLuong'];
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
            $product_quantity = $_POST['product_quantity'];
            $product_size = $_POST['product_size'];

            if (isset($_SESSION['user'])) {
                $user_id = $_SESSION['user']['MaKhachHang'];
                $this->cartModel->addToCart($user_id, $product_id, $product_quantity, $product_size);
            } else {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                if (isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id]['SoLuong'] += 1;
                } else {
                    $_SESSION['cart'][$product_id] = [
                        'MaGioHang' => $product_id,
                        'TenSanPham' => $product_name,
                        'DonGia' => $product_price,
                        'HinhAnh' => $product_image,
                        'SoLuong' => 1,
                        'KichThuoc' => $product_size
                    ];
                }
            }
            header('Location: /cart');
        }
    }

    public function removeFromCart($productId)
    {
        if (isset($_SESSION['user'])) {
            $this->cartModel->removeFromCart($_SESSION['user']['MaKhachHang'], $productId);
        } elseif (isset($_SESSION['cart'][$productId])) {
            if ($_SESSION['cart'][$productId]['SoLuong'] > 1) {
                $_SESSION['cart'][$productId]['SoLuong'] -= 1;
            } else {
                unset($_SESSION['cart'][$productId]);
            }
        }

        header('Location: /cart');
        exit;
    }

    public function updateCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = $_POST['product_id'];
            $product_quantity = $_POST['product_quantity'];
            $product_size = $_POST['product_size'];

            if (isset($_SESSION['user'])) {
                $user_id = $_SESSION['user']['MaKhachHang'];
                $this->cartModel->updateCart($user_id, $product_id, $product_quantity, $product_size);
            } else {
                if (isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id]['SoLuong'] = $product_quantity;
                    $_SESSION['cart'][$product_id]['KichThuoc'] = $product_size;
                }
            }

            header('Location: /cart');
        }
    }

    public function checkout()
    {
        $checkoutItems = $this->getCartItems();
        require_once __DIR__ . '/../views/pages/checkout.php';
        return $checkoutItems;
    }

    public function checkoutProcess() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user'])) {
            try {
                $user_id = $_SESSION['user']['MaKhachHang'];
                $cartItems = $this->cartModel->getCartItemByUser($user_id);
                
                // Lấy thông tin từ form
                $orderData = [
                    'MaKhachHang' => $user_id,
                    'DiaChiNhanHang' => $_POST['address'],
                    'ThanhPho' => $_POST['city'],
                    'TongTien' => $_POST['total_amount'],
                    'PhuongThucThanhToan' => $_POST['payment_method'],
                    'selected_items' => $_POST['selected_items'] ?? []
                ];
    
                // Tạo đơn hàng
                $orderId = $this->cartModel->createOrder($orderData, $cartItems);
                
                // Xóa các sản phẩm đã đặt khỏi giỏ hàng
                foreach ($orderData['selected_items'] as $productId) {
                    $this->cartModel->deleteCartItem($user_id, $productId);
                }
    
                $_SESSION['order_success'] = true;
                $_SESSION['order_id'] = $orderId;
                header('Location: /order/success');
                exit;
                
            } catch (\Exception $e) {
                $_SESSION['error'] = 'Có lỗi xảy ra khi đặt hàng: ' . $e->getMessage();
                header('Location: /checkout');
                exit;
            }
        }
    
        $_SESSION['error'] = 'Yêu cầu không hợp lệ';
        header('Location: /checkout');
        exit;
    }
}
