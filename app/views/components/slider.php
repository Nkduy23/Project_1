<?php if (!empty($sliders)): ?>
  <div class="slider">
    <?php foreach ($sliders as $slider): ?>
      <div class="slider__item">
        <img
          class="slider__img"
          src="<?= $GLOBALS['baseUrl'] ?>img/slider/<?php echo htmlspecialchars($slider['image']); ?>"
          data-large="<?= $GLOBALS['baseUrl'] ?>img/slider/<?php echo htmlspecialchars($slider['image_large']); ?>"
          data-small="<?= $GLOBALS['baseUrl'] ?>img/slider/<?php echo htmlspecialchars($slider['image_small']); ?>"
          alt="Slider <?php echo htmlspecialchars($slider['id']); ?>" />
      </div>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <p>No sliders available.</p>
<?php endif; ?>