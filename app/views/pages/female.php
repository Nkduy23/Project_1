<?php
$femaleProducts = $products ?? [];
?>

<div class="container-main no-border">
    <?php
    getBreadcrumb();
    ?>
    <div class="product">
        <div class="product__container flex-column-center">
            <div class="product__list">
                <?php if (!empty($femaleProducts)): ?>
                    <?php foreach ($femaleProducts as $product): ?>
                        <div class="product__item">
                            <a href="<?php echo htmlspecialchars($product['Link']); ?>">
                                <img src="<?= $GLOBALS['baseUrl'] ?>img/product/<?php echo htmlspecialchars($product['HinhAnh']); ?>"
                                    data-hover="<?= $GLOBALS['baseUrl'] ?>img/product/<?php echo htmlspecialchars($product['HinhAnhHover']); ?>"
                                    alt="<?php echo htmlspecialchars($product['TenSanPham']); ?>"
                                    class="product__img">
                            </a>
                            <?php if (!empty($product['Nhan'])): ?>
                                <div class="product__label"><?php echo htmlspecialchars($product['Nhan']); ?></div>
                            <?php endif; ?>
                            <p class="product__name">
                                <a href="<?php echo htmlspecialchars($product['Link']); ?>">
                                    <?php echo htmlspecialchars($product['TenSanPham']); ?>
                                </a>
                            </p>
                            <p class="product__price"><?php echo number_format($product['DonGia'], 0, ',', '.') ?> ₫</p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="no-products">Hiện tại chưa có sản phẩm nào.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>