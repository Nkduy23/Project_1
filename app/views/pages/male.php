<?php
require_once __DIR__ . '/../../controllers/CallControllers.php';
require_once __DIR__ . '/../components/breadcrumb.php';

// Lấy danh sách sản phẩm Nam từ Controller
$maleProducts = $productController->getProducts('male');
?>

<div class="container-main no-border">
    <?php
    getBreadcrumb();
    ?>
    <div class="product">
        <div class="product__container flex-column-center">
            <div class="product__list">
                <?php if (!empty($maleProducts)): ?>
                    <?php foreach ($maleProducts as $product): ?>
                        <div class="product__item">
                            <a href="<?php echo htmlspecialchars($product['link']); ?>">
                                <img src="<?= $baseUrl ?>img/product/<?php echo htmlspecialchars($product['image']); ?>"
                                    data-hover="<?= $baseUrl ?>img/product/<?php echo htmlspecialchars($product['image_hover']); ?>"
                                    alt="<?php echo htmlspecialchars($product['name']); ?>"
                                    class="product__img">
                            </a>
                            <?php if (!empty($product['label'])): ?>
                                <div class="product__label"><?php echo htmlspecialchars($product['label']); ?></div>
                            <?php endif; ?>
                            <p class="product__name">
                                <a href="<?php echo htmlspecialchars($product['link']); ?>">
                                    <?php echo htmlspecialchars($product['name']); ?>
                                </a>
                            </p>
                            <p class="product__price"><?php echo number_format($product['price'], 0, ',', '.') ?> ₫</p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="no-products">Hiện tại chưa có sản phẩm nào.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>