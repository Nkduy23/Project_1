<?php
$baseUrl = $GLOBALS['baseUrl'] ?? '/';
?>
<div class="cart-container">
    <h2>Giỏ hàng của bạn</h2>
    <?php if (empty($cartItems)): ?>
        <p>Giỏ hàng trống.</p>
    <?php else: ?>
        <?php if (!empty($_SESSION['message'])): ?>
            <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
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
                    <td><img src="<?= $baseUrl ?>img/product/<?= htmlspecialchars($item['image']) ?>" width="50"></td>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= number_format($item['price'], 0, ',', '.') ?> VNĐ</td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?> VNĐ</td>
                    <td>
                        <form action="/cart/remove/<?= $item['id'] ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <a href="/">Tiếp tục mua sắm</a>
</div>