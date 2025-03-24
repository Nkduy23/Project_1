<?php if (!empty($sliders)): ?>
  <div class="slider">
    <?php foreach ($sliders as $slider): ?>
      <div class="slider__item">
        <img
          class="slider__img"
          src="<?= $baseUrl ?>img/slider/<?php echo htmlspecialchars($slider['image']); ?>"
          data-large="<?= $baseUrl ?>img/slider/<?php echo htmlspecialchars($slider['image_large']); ?>"
          data-small="<?= $baseUrl ?>img/slider/<?php echo htmlspecialchars($slider['image_small']); ?>"
          alt="Slider <?php echo htmlspecialchars($slider['id']); ?>" />
      </div>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <p>No sliders available.</p>
<?php endif; ?>