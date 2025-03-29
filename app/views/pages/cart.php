<main class="cart-container">
        <h2>Giỏ hàng của bạn</h2>
        <?php if (empty($cartItems)) : ?>
            <p class="empty-cart">Giỏ hàng trống.</p>
        <?php else : ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $totalPrice = 0;
                    foreach ($cartItems as $item) : 
                        $subtotal = $item['price'] * $item['quantity'];
                        $totalPrice += $subtotal;
                    ?>
                    <tr>
                        <td class="product">
                            <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                            <span><?= htmlspecialchars($item['name']) ?></span>
                        </td>
                        <td><?= formatCurrency($item['price']) ?></td>
                        <td>
                            <input type="number" value="<?= $item['quantity'] ?>" min="1">
                        </td>
                        <td><?= formatCurrency($subtotal) ?></td>
                        <td>
                            <button class="remove-btn">Xóa</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="cart-summary">
                <h3>Tổng cộng: <?= formatCurrency($totalPrice) ?></h3>
                <button class="checkout-btn">Thanh toán</button>
            </div>
        <?php endif; ?>
    </main>