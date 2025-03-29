<?php if (!empty($services)): ?>
  <div class="container-main">
    <div class="service">
      <div class="service__container flex-column-center">
        <div class="service__title">Các Dịch Vụ Tại Khánh Duy</div>
        <div class="service__list grid-3 gap-10">
          <?php foreach ($services as $service): ?>
            <div class="service__item">
              <a href="<?php echo htmlspecialchars($service['link'] ?? '#'); ?>">
                <img src="<?= $baseUrl ?>img/service/<?php echo htmlspecialchars($service['image']); ?>"
                  alt="<?php echo htmlspecialchars($service['title']); ?>" />
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
<?php else: ?>
  <p>Hiện tại chưa có dịch vụ nào.</p>
<?php endif; ?>