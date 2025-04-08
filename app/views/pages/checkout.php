<?php
if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit;
}

$user = $_SESSION['user'];
$tongTien = $_POST['total_amount'] ?? 0;
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
</head>

<body>
    <div class="checkout-container">
        <div class="checkout">
            <h2 class="checkout__title">Thông tin thanh toán</h2>
            <form method="POST" action="/checkout/process" class="flex-column-center-justify gap-16">
                <?php foreach ($checkoutItems as $checkoutItem): ?>
                    <div class="checkout__item gap-16">
                        <input type="checkbox" name="selected_items[]" value="<?= $checkoutItem['MaSanPham'] ?>" checked>
                        <div class="checkout__left">
                            <img class="checkout__img" src="<?= $GLOBALS['baseUrl'] ?>img/product/<?= htmlspecialchars($checkoutItem['HinhAnh']) ?>" alt="<?= htmlspecialchars($checkoutItem['TenSanPham']) ?>" style="width: 100px; height: auto;">
                        </div>

                        <div class="checkout__right">
                            <p><strong><?= htmlspecialchars($checkoutItem['TenSanPham']) ?></strong></p>
                            <p>Giá: <?= number_format($checkoutItem['DonGia'], 0, ',', '.') ?> ₫</p>
                            <p>Kích thước: <?= htmlspecialchars($checkoutItem['KichThuoc']) ?></p>
                            <p>Số lượng: <?= $checkoutItem['SoLuong'] ?></p>
                        </div>
                        <button type="button" class="checkout__remove-btn" onclick="removeItem(<?= $checkoutItem['MaGioHang'] ?>)">Xóa</button>
                    </div>
                    <hr>
                <?php endforeach; ?>

                <label for="discount_code">Mã giảm giá (nếu có):</label>
                <input type="text" name="discount_code" id="discount_code" placeholder="Nhập mã giảm giá">

                <label for="name">Tên:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($user['TenDangNhap']) ?>" readonly>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($user['Email']) ?>" readonly>

                <label for="address">Địa chỉ nhận hàng:</label>
                <textarea name="address" id="address" rows="3" placeholder="Số nhà, đường, phường/xã..." required></textarea>

                <label for="city">Tỉnh / Thành phố:</label>
                <input type="text" name="city" id="city" placeholder="VD: Hồ Chí Minh, Hà Nội..." required>

                <label for="payment_method">Phương thức thanh toán:</label>
                <select name="payment_method" id="payment_method" required>
                    <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                    <option value="bank">Chuyển khoản ngân hàng</option>
                    <option value="momo">Ví MoMo</option>
                </select>

                <h3>Tổng tiền cần thanh toán: <?= number_format($tongTien, 0, ',', '.') ?> VND</h3>
                <input type="hidden" name="total_amount" value="<?= $tongTien ?>">

                <button type="submit">Xác nhận đặt hàng</button>
            </form>
        </div>
    </div>

    <script>
        function removeItem(itemId) {
            if (confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?')) {
                window.location.href = '/cart/remove/' + itemId;
            }
        }
    </script>
</body>

</html>