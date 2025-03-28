<?php
require_once __DIR__ . '/../../controllers/Controllers.php';
require_once __DIR__ . '/../components/breadcrumb.php';

// Lấy ID sản phẩm từ URL
$productId = $_GET['id'] ?? null;

// Kiểm tra nếu không có ID sản phẩm
if (!$productId) {
    echo "<p class='error-message'>Sản phẩm không tồn tại.</p>";
    exit;
}

// Lấy thông tin sản phẩm từ Controller
$product = $productController->getProductById($productId);

if (!$product) {
    echo "<p class='error-message'>Không tìm thấy sản phẩm.</p>";
    exit;
}
?>

<div class="container-main no-border">
    <?php getBreadcrumb(); ?>

    <div class="product-detail">
        <!-- Cột trái: Hình ảnh sản phẩm -->
        <div class="product-detail__left">
            <div class="product-detail__image">
                <img id="main-image" src="<?= $baseUrl ?>img/product/<?php echo htmlspecialchars($product['image']); ?>" 
                     alt="<?php echo htmlspecialchars($product['name']); ?>">
            </div>
            <div class="product-detail__thumbnails">
                <img class="thumbnail" src="<?= $baseUrl ?>img/product/<?php echo htmlspecialchars($product['image']); ?>" 
                     alt="Thumbnail 1" onclick="changeImage(this)">
                <img class="thumbnail" src="<?= $baseUrl ?>img/product/<?php echo htmlspecialchars($product['image_hover']); ?>" 
                     alt="Thumbnail 2" onclick="changeImage(this)">
            </div>
        </div>

        <!-- Cột phải: Thông tin sản phẩm -->
        <div class="product-detail__right">
            <h1 class="product-detail__name"><?php echo htmlspecialchars($product['name']); ?></h1>
            <p class="product-detail__price"><?php echo number_format($product['price'], 0, ',', '.') ?> ₫</p>
            
            <?php if (!empty($product['label'])): ?>
                <div class="product-detail__label"><?php echo htmlspecialchars($product['label']); ?></div>
            <?php endif; ?>

            <p class="product-detail__description">
                <?php echo htmlspecialchars($product['description']); ?>
            </p>

            <button class="product-detail__buy-btn gray">Xem Showroom còn hàng</button>
            <button class="product-detail__buy-btn darkred">Thêm vào giỏ hàng</button>
            <button class="product-detail__buy-btn blue">Mua trả góp - Duyệt hồ sơ trong 3 phút</button>
            <p class="product-detail__text">Có thanh toán:<b> Trả góp</b> khi mua Online (Qua thẻ tín dụng)</p>
            <p class="product-detail__text">Gọi đặt mua:<b> 1900.6777 (8:00-1:30)</b></p>
            <div class="product-detail__note">
                <p>Ưu đãi thêm dự kiến áp dụng 2025</p>
                <hr>
                <p>Dịch vụ gói quà miễn phí khi mua tại cửa hàng.</p>
                <p>Khi thanh toán qua Home PayLater tại Hải Triều:</p>
                <ul>
                    <li>- Giảm 50% tối đa 100K cho đơn từ 200K</li>
                    <li>- Giảm 5% tối đa 500K</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    function changeImage(thumbnail) {
        document.getElementById('main-image').src = thumbnail.src;
    }
</script>
