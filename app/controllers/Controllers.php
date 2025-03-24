<?php
require_once __DIR__ . './SliderController.php';
require_once __DIR__ . './FeatureController.php';
require_once __DIR__ . './BannerController.php';
require_once __DIR__ . './ProductController.php';
require_once __DIR__ . './ServiceController.php';
require_once __DIR__ . './Top10Controller.php';
require_once __DIR__ . './BrandController.php';
require_once __DIR__ . './NewsController.php';

$sliderController = new SliderController();
$featureController = new FeatureController();
$bannerController = new BannerController();
$productController = new ProductController();
$serviceController = new ServiceController();
$top10Controller = new Top10Controller();
$brandController = new BrandController();
$newsController = new NewsController();

?>