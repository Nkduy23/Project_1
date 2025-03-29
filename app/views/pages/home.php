<?php
require_once __DIR__ . '/../../controllers/CallControllers.php';

// Gọi dữ liệu trước khi render giao diện
$sliders = $mediaController->getMedia(
    'type',
    'slider',
    'id,image, image_large, image_small, title, link'
);
$features = $mediaController->getMedia(
    'type',
    'feature',
    'image, title, link'
);
$bannerTop = $mediaController->getMedia(
    'banner_type',
    'top',
    'image, title, link, banner_type, position'
);
$bannerBottom = $mediaController->getMedia(
    'banner_type',
    'bottom',
    'image, title, link, banner_type, position'
);

// Product
$maleProducts = $productController->getProducts('male', 8);
$femaleProducts = $productController->getProducts('female', 8);
$jewelryProducts = $productController->getProducts('jewelry', 8);
$leatherProducts = $productController->getProducts('leather', 8);
$saleProducts = $productController->getSaleProducts();

// Service
$services =  $mediaController->getMedia(
    'type',
    'service',
    'image, title, link'
);

// Top 10
$top10 =  $mediaController->getMedia(
    'type',
    'top10',
    'image, image_large, image_small'
);

// Brand
$popularBrands = $brandController->getBrands('popular');
$swissBrands = $brandController->getBrands('swiss');
$jewelryBrands = $brandController->getBrands('jewelry');

// News
$allNews = $newsController->getAllNews();
$featuredNews = $newsController->getFeaturedNews();

?>

<main>
    <?php require 'components/launcher.php'; ?>
    <?php require 'components/slider.php'; ?>
    <?php require 'components/feature.php'; ?>
    <?php require 'components/banner.php'; ?>
    <?php require 'components/product.php'; ?>
    <?php require 'components/service.php'; ?>
    <?php require 'components/top10.php'; ?>
    <?php require 'components/brand.php'; ?>
    <?php require 'components/new.php'; ?>
</main>