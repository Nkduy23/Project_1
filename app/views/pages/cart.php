<?php
$baseUrl = $GLOBALS['baseUrl'] ?? '/';
?>
<div class="cart-container">
  <div class="cart">
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
                    <th>Kích thước</th>
                    <th>Cập nhật</th>
                    <th>Tổng</th>
                    <th>Hành động</th>
                </tr>
                <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td><img src="<?= $baseUrl ?>img/product/<?= htmlspecialchars($item['HinhAnh']) ?>" width="50"></td>
                        <td><?= htmlspecialchars($item['TenSanPham']) ?></td>
                        <td><?= number_format($item['DonGia'], 0, ',', '.') ?> VNĐ</td>
                        <form action="/update-cart" method="POST">
                            <input type="hidden" name="product_id" value="<?= $item['MaGioHang'] ?>">
                            <td><input type="number" name="product_quantity" value="<?= $item['SoLuong'] ?>"></td>
                            <td>
                                <select name="product_size">
                                    <option value="S" <?= $item['KichThuoc'] == 'S' ? 'selected' : '' ?>>S</option>
                                    <option value="M" <?= $item['KichThuoc'] == 'M' ? 'selected' : '' ?>>M</option>
                                    <option value="L" <?= $item['KichThuoc'] == 'L' ? 'selected' : '' ?>>L</option>
                                    <option value="XL" <?= $item['KichThuoc'] == 'XL' ? 'selected' : '' ?>>XL</option>
                                </select>
                            </td>
                           <td> <button type="submit">Cập nhật</button></td>
                        </form>
                        <td><?= number_format($item['DonGia'] * $item['SoLuong'], 0, ',', '.') ?> VNĐ</td>
                        <td>
                            <form action="/cart/remove/<?= $item['MaGioHang'] ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $item['MaGioHang'] ?>">
                                <button type="submit">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    
        <div class="cart__back"><a class="cart__back-link" href="/">Tiếp tục mua sắm</a></div>
    
        <div class="cart__total">
            <?php
            $tongTien = 0;
            foreach ($cartItems as $item) {
                $tongTien += $item['DonGia'] * $item['SoLuong'];
            }
            ?>
            <h3>Tổng tiền: <?= number_format($tongTien) ?> VND</h3>
            <form action="/checkout" method="POST">
                <input type="hidden" name="total_amount" value="<?= $tongTien ?>">
                <button type="submit">Tiến hành thanh toán</button>
            </form>
    
  </div>
    </div>
</div>