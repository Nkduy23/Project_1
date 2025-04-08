<?php if (!empty($features)): ?>
    <div class="feature flex-center">
        <button class="feature__arrow feature__arrow--left">
            <i class="fa-solid fa-angles-left"></i>
        </button>
        <div class="feature__list">
            <div class="feature__wrapper flex">
                <?php foreach (array_chunk($features, 6) as $featureGroup): ?>
                    <div class="feature__group grid-3">
                        <?php foreach ($featureGroup as $feature): ?>
                            <div class="feature__item">
                                <a href="<?php echo htmlspecialchars($feature['link'] ?? '#'); ?>">
                                    <img src="<?= $GLOBALS['baseUrl'] ?>img/feature/<?php echo htmlspecialchars($feature['image']); ?>"
                                        alt="<?php echo htmlspecialchars($feature['title']); ?>"
                                        class="feature__img" />
                                </a>
                                <p class="feature__title"><?php echo htmlspecialchars($feature['title']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <button class="feature__arrow feature__arrow--right">
            <i class="fa-solid fa-angles-right"></i>
        </button>
    </div>
<?php else: ?>
    <p>No features available.</p>
<?php endif; ?>