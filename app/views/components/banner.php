<!-- Banner Top -->
<?php if (!empty($bannerTop)): ?>
  <div class="container-main">
    <div class="banner-top grid-2 gap-10">
      <div class="banner-top__left">
        <img src="<?= $baseUrl ?>img/banner/<?php echo htmlspecialchars($bannerTop[0]['image']); ?>"
          alt="<?php echo htmlspecialchars($bannerTop[0]['title']); ?>" />
        <div class="banner-top__text flex-column-center-items">
          <p class="banner-top__title"><?php echo htmlspecialchars($bannerTop[0]['title']); ?></p>
          <a class="banner-top__link" href="<?php echo htmlspecialchars($bannerTop[0]['link']); ?>">Xem ngay</a>
        </div>
      </div>
      <div class="banner-top__right grid gap-10">
        <?php for ($i = 1; $i < count($bannerTop); $i++): ?>
          <div class="banner-top__image <?php echo ($i == count($bannerTop) - 1) ? 'full' : 'small'; ?>">
            <img src="<?= $baseUrl ?>img/banner/<?php echo htmlspecialchars($bannerTop[$i]['image']); ?>"
              alt="<?php echo htmlspecialchars($bannerTop[$i]['title']); ?>" />
            <div class="banner-top__text flex-column-center-items">
              <p class="banner-top__title"><?php echo htmlspecialchars($bannerTop[$i]['title']); ?></p>
              <a class="banner-top__link" href="<?php echo htmlspecialchars($bannerTop[$i]['link']); ?>">Xem ngay</a>
            </div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<!-- Banner Bottom -->
<?php if (!empty($bannerBottom)): ?>
  <div class="container-main">
    <div class="banner-bottom grid-4 gap-10">
      <?php foreach ($bannerBottom as $banner): ?>
        <div class="banner-bottom__item flex-column-center-items gap-10">
          <img src="<?= $baseUrl ?>img/banner/<?php echo htmlspecialchars($banner['image']); ?>"
            alt="<?php echo htmlspecialchars($banner['title']); ?>" />
          <span class="banner-bottom__title"><?php echo htmlspecialchars($banner['title']); ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>