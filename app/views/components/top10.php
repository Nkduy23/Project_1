<?php if (!empty($top10)): ?>
  <div class="container-main">
    <div class="top10">
      <div class="top10__list">
        <?php foreach ($top10 as $item): ?>
          <div class="top10__item">
            <img
              class="top10__img"
              src="<?= $GLOBALS['baseUrl'] ?>img/top10/<?php echo htmlspecialchars($item['image']); ?>"
              data-large="<?= $GLOBALS['baseUrl'] ?>img/top10/<?php echo htmlspecialchars($item['image_large']); ?>"
              data-small="<?= $GLOBALS['baseUrl'] ?>img/top10/<?php echo htmlspecialchars($item['image_small']); ?>"
              alt="Hình ảnh top 10" />
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
<?php else: ?>
  <p>Chưa có dữ liệu top 10.</p>
<?php endif; ?>