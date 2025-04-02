<?php
$sliders = $data['sliders'] ?? null;
$features = $data['features'] ?? null;
$bannerTop = $data['bannerTop'] ?? null;
$bannerBottom = $data['bannerBottom'] ?? null;
$maleProducts = $data['maleProducts'] ?? null;
$femaleProducts = $data['femaleProducts'] ?? null;
$jewelryProducts = $data['jewelryProducts'] ?? null;
$leatherProducts = $data['leatherProducts'] ?? null;
$saleProducts = $data['saleProducts'] ?? null;
$services = $data['services'] ?? null;
$allNews = $data['allNews'] ?? null;
$featuredNews = $data['featuredNews'] ?? null;
$popularBrands = $data['popularBrands'] ?? null;
$swissBrands = $data['swissBrands'] ?? null;
$jewelryBrands = $data['jewelryBrands'] ?? null;
$top10 = $data['top10'] ?? null;
?>
<main>
    <?php require __DIR__ . '/../components/launcher.php'; ?>

    <!-- Slider Section -->
    <?php if (!empty($sliders)): ?>
        <?php require __DIR__ . '/../components/slider.php'; ?>
    <?php else: ?>
        <section class="no-data">
            <p>No sliders available</p>
        </section>
    <?php endif; ?>

    <!-- Feature Section -->
    <?php if (!empty($features)): ?>
        <?php require __DIR__ . '/../components/feature.php'; ?>
    <?php else: ?>
        <section class="no-data">
            <p>No features available</p>
        </section>
    <?php endif; ?>

    <!-- Banner Section -->
    <?php if (!empty($bannerTop) || !empty($bannerBottom)): ?>
        <?php require __DIR__ . '/../components/banner.php'; ?>
    <?php else: ?>
        <section class="no-data">
            <p>No banner available</p>
        </section>
    <?php endif; ?>

    <!-- Product Sections -->
    <?php if (!empty($maleProducts) || !empty($femaleProducts) || !empty($jewelryProducts) || !empty($leatherProducts) || !empty($saleProducts)): ?>
        <?php require __DIR__ . '/../components/product.php'; ?>
    <?php else: ?>
        <section class="no-data">
            <p>No products available</p>
        </section>
    <?php endif; ?>

    <!-- Service Section -->
    <?php if (!empty($services)): ?>
        <?php require __DIR__ . '/../components/service.php'; ?>
    <?php else: ?>
        <section class="no-data">
            <p>No services available</p>
        </section>
    <?php endif; ?>

    <!-- Top 10 Section -->
    <?php if (!empty($top10)): ?>
        <?php require __DIR__ . '/../components/top10.php'; ?>
    <?php else: ?>
        <section class="no-data">
            <p>No top 10 available</p>
        </section>
    <?php endif; ?>

    <!-- Brand Section -->
    <?php if (!empty($popularBrands) || !empty($swissBrands) || !empty($jewelryBrands)): ?>
        <?php require __DIR__ . '/../components/brand.php'; ?>
    <?php else: ?>
        <section class="no-data">
            <p>No brands available</p>
        </section>
    <?php endif; ?>

    <!-- News Section -->
    <?php if (!empty($allNews) || !empty($featuredNews)): ?>
        <?php require __DIR__ . '/../components/new.php'; ?>
    <?php else: ?>
        <section class="no-data">
            <p>No news available</p>
        </section>
    <?php endif; ?>
</main>

<?php if (isset($_SESSION['login_success'])): ?>
    <div id="successMessage" class="success-message">
        <span class="checkmark">✔</span>
        <p><?= htmlspecialchars($_SESSION['login_success']) ?></p>
    </div>

    <script>
        setTimeout(() => {
            let message = document.getElementById('successMessage');
            if (message) {
                message.classList.add('fade-out');
                setTimeout(() => message.style.display = 'none', 500);
            }
        }, 1000);
    </script>
    <?php unset($_SESSION['login_success']); ?>
<?php endif; ?>