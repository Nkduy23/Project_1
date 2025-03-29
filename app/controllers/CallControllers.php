<?php
require_once __DIR__ . './MediaController.php';
require_once __DIR__ . './ProductController.php';
require_once __DIR__ . './BrandController.php';
require_once __DIR__ . './NewsController.php';
require_once __DIR__ . './UserController.php';

$mediaController = new MediaController();
$productController = new ProductController();
$brandController = new BrandController();
$newsController = new NewsController();
$userController = new UserController();
?>