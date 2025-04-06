<!-- Sản Phẩm Khuyến Mãi -->
<?php if (!empty($saleProducts)): ?>
  <div class="container-main">
    <div class="product sale">
      <div class="product__container flex-column-center">
        <h2 class="product__title">Sản Phẩm Khuyến Mãi</h2>
        <div class="flash-sale" role="region" aria-labelledby="flashSaleTitle">
          <div class="flash-sale__timer flex" aria-live="countdown">
            <div class="flash-sale__timer-box">
              <span id="days" class="flash-sale__timer-value">00</span>
            </div>
            <div class="flash-sale__timer-box">
              <span id="hours" class="flash-sale__timer-value">00</span>
            </div>
            <div class="flash-sale__timer-box">
              <span id="minutes" class="flash-sale__timer-value">00</span>
            </div>
            <div class="flash-sale__timer-box">
              <span id="seconds" class="flash-sale__timer-value">00</span>
            </div>
          </div>
        </div>
        <div class="product__list">
          <?php foreach ($saleProducts as $product): ?>
            <div class="product__item">
              <a href="<?php echo htmlspecialchars($product['Link']); ?>">
                <img src="<?= $baseUrl ?>img/product/<?php echo htmlspecialchars($product['HinhAnh']); ?>"
                  data-hover="<?= $baseUrl ?>img/product/<?php echo htmlspecialchars($product['HinhAnhHover']); ?>"
                  alt="<?php echo htmlspecialchars($product['TenSanPham']); ?>" class="product__img">
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
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<!-- Hiển thị từng loại sản phẩm -->
<?php
$productCategories = [
  'Đồng Hồ Nam Bán Chạy' => $maleProducts,
  'Đồng Hồ Nữ Bán Chạy' => $femaleProducts,
  'Trang Sức Thời Trang' => $jewelryProducts,
  'Đồ Da Thật Cao Cấp' => $leatherProducts
];


foreach ($productCategories as $title => $products):
?>
  <?php if (!empty($products)): ?>
    <div class="container-main">
      <div class="product">
        <div class="product__container flex-column-center">
          <h2 class="product__title"><?php echo "$title"; ?></h2>
          <div class="product__list">
            <?php foreach ($products as $product): ?>
              <div class="product__item">
                <a href="<?php echo htmlspecialchars($product['Link']); ?>">
                  <img src="<?= $baseUrl ?>img/product/<?php echo htmlspecialchars($product['HinhAnh']); ?>"
                    data-hover="<?= $baseUrl ?>img/product/<?php echo htmlspecialchars($product['HinhAnhHover']); ?>"
                    alt="<?php echo htmlspecialchars($product['TenSanPham']); ?>" class="product__img">
                </a>
                <?php if (!empty($product['label'])): ?>
                  <div class="product__label"><?php echo htmlspecialchars($product['label']); ?></div>
                <?php endif; ?>
                <p class="product__name">
                  <a href="<?php echo htmlspecialchars($product['Link']); ?>">
                    <?php echo htmlspecialchars($product['TenSanPham']); ?>
                  </a>
                </p>
                <p class="product__price"><?php echo number_format($product['DonGia'], 0, ',', '.') ?> ₫</p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
<?php endforeach; ?>