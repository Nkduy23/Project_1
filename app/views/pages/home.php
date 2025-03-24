<?php
require_once __DIR__ . '/../../controllers/Controllers.php';

// Gọi dữ liệu trước khi render giao diện
$sliders = $sliderController->getAllSliders();
$features = $featureController->getAllFeature();
$bannerTop = $bannerController->getBanners('top');
$bannerBottom = $bannerController->getBanners('bottom');

// Product
$menProducts = $productController->getProducts('men');
$womenProducts = $productController->getProducts('women');
$jewelryProducts = $productController->getProducts('jewelry');
$leatherProducts = $productController->getProducts('leather');
$saleProducts = $productController->getSaleProducts();

// Service
$services = $serviceController->getAllServices();

// Top 10
$top10 = $top10Controller->getTop10();

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