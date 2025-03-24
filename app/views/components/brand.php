<div class="brand">
    <?php
    $brandCategories = [
        'Thương Hiệu Đồng Hồ Nổi Tiếng' => $popularBrands,
        'Thương Hiệu Đồng Hồ Cao Cấp Thụy Sỹ' => $swissBrands,
        'Thương Hiệu Trang Sức Và Phụ Kiện' => $jewelryBrands
    ];

    foreach ($brandCategories as $title => $brands):
    ?>
        <?php if (!empty($brands)): ?>
            <div class="brand__container flex-column-center-justify">
                <div class="brand__title"><?php echo $title; ?></div>
                <button class="brand__arrow brand__arrow--left">
                    <i class="fa-solid fa-angles-left"></i>
                </button>
                <div class="brand__list flex-column-center-justify">
                    <div class="brand__wrapper flex gap-10">
                        <?php foreach (array_chunk($brands, 6) as $brandGroup): ?>
                            <div class="brand__group grid-3 gap-10">
                                <?php foreach ($brandGroup as $brand): ?>
                                    <div class="brand__item">
                                        <a href="<?php echo htmlspecialchars($brand['link']); ?>">
                                            <img src="<?= $baseUrl ?>img/brand/<?php echo htmlspecialchars($brand['image']); ?>"
                                                alt="Thương hiệu <?php echo htmlspecialchars($brand['name']); ?>" />
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button class="brand__arrow brand__arrow--right">
                    <i class="fa-solid fa-angles-right"></i>
                </button>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>