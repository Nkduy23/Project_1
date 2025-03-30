<?php
require_once __DIR__ . '/../../models/CallDatabase.php';

class CartHandler extends CallDatabase
{
    public function getCart()
    {
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];
            return $this->db->getAll("SELECT c.*, p.name, p.price, p.image FROM cart c 
                                      JOIN products p ON c.product_id = p.id 
                                      WHERE c.user_id = ?", [$user_id]);
        } else {
            return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        }
    }
}

$cartHandler = new CartHandler();
$cartItems = $cartHandler->getCart();
?>

<div class="cart-container">
    <h2>Giỏ hàng của bạn</h2>

    <?php if (empty($cartItems)): ?>
        <p>Giỏ hàng trống.</p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th>Hành động</th>
            </tr>
            <?php foreach ($cartItems as $item): ?>
                <tr>
                    <td><img src="<?= $baseUrl ?>img/product/<?= $item['image'] ?>" width="50"></td>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= number_format($item['price'], 0, ',', '.') ?> VNĐ</td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?> VNĐ</td>
                    <td>
                        <a href="remove_from_cart.php?id=<?= isset($item['product_id']) ? $item['product_id'] : $key ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <a href="/">Tiếp tục mua sắm</a>
</div>