<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trang chủ - Đồng Hồ Khánh Duy</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <?php
  $uri = $_SERVER['REQUEST_URI'];
  ?>

  <!-- CSS chung cho tất cả các trang -->
  <link rel="stylesheet" href="<?= $GLOBALS['baseUrl'] ?>css/main.css?v=<?= time(); ?>" />

  <!-- Trang chủ (/) -->
  <?php if ($uri === '/' || $uri === '/index.php'): ?>
    <link rel="stylesheet" href="<?= $GLOBALS['baseUrl'] ?>css/home.css?v=<?= time(); ?>" />
  <?php endif; ?>

  <!-- Các trang product: /product/male, /product/female,... -->
  <?php if (preg_match('#^/products/(male|female|couple|jewelry|leather|accessories)(/.*)?$#', $uri)): ?>
    <link rel="stylesheet" href="<?= $GLOBALS['baseUrl'] ?>css/product.css?v=<?= time(); ?>" />
  <?php endif; ?>

  <!-- Trang chi tiết sản phẩm: /detail/123, /detail/abc -->
  <?php if (preg_match('#^/detail(/.*)?$#', $uri)): ?>
    <link rel="stylesheet" href="<?= $GLOBALS['baseUrl'] ?>css/detail.css?v=<?= time(); ?>" />
  <?php endif; ?>

  <!-- Trang giỏ hàng -->
  <?php if (preg_match('#^/(cart|checkout)(/.*)?$#', $uri)): ?>
    <link rel="stylesheet" href="<?= $GLOBALS['baseUrl'] ?>css/cart.css?v=<?= time(); ?>" />
  <?php endif; ?>

  <!-- Trang login & register -->
  <?php if (preg_match('#^/(login|register)(/.*)?$#', $uri)): ?>
    <link rel="stylesheet" href="<?= $GLOBALS['baseUrl'] ?>css/auth.css?v=<?= time(); ?>" />
  <?php endif; ?>

  <!-- Trang profile -->
  <?php if (preg_match('#^/profile(/.*)?$#', $uri)): ?>
    <link rel="stylesheet" href="<?= $GLOBALS['baseUrl'] ?>css/profile.css?v=<?= time(); ?>" />
  <?php endif; ?>

</head>

<body>
  <header class="header">

    <!-- Header top -->
    <div class="header__top">
      <p>Bộ Sưu Tập Đồng Hồ Mới Về</p>
    </div>

    <!-- Header bottom -->
    <div class="header__bottom flex-between">
      <!-- Icon menu -->
      <div class="header__menu">
        <i class="fa-solid fa-bars bar"></i>
      </div>
      <!-- Logo -->
      <div class="header__logo">
        <a href="/"><img src="<?= $GLOBALS['baseUrl'] ?>/img/logo.png" alt="logo Khánh Duy" /></a>
      </div>
      <!-- Search -->
      <div class="header__search flex-center gap-16">
        <div class="header__search-input">
          <input type="text" placeholder="Tìm kiếm..." />
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div class="header__cart flex-center gap-16">
          <a href="/cart">
            <div class="header__cart-left">
              <i class="fa-solid fa-bag-shopping"></i>
              <span class="flex-center"><?php echo $cartCount; ?></span>
            </div>
          </a>
          <a href="<?php echo isset($_SESSION['user']) ? '/profile' : '/login'; ?>">
            <div class="header__cart-right">
              <?php if (isset($_SESSION['user'])) : ?>
                <i class="fa-solid fa-user-check"></i>
              <?php else : ?>
                <i class="fa-solid fa-user"></i>
              <?php endif; ?>
            </div>
          </a>
        </div>
      </div>
    </div>
  </header>
  <!-- Search mobile -->
  <div class="search-input-mobile">
    <div class="search-input">
      <input type="text" placeholder="Tìm kiếm sản phẩm hoặc thương hiệu" />
      <i class="fa-solid fa-magnifying-glass"></i>
    </div>
  </div>
  <?php
  require_once __DIR__ . "/../components/nav.php";
  ?>

  <!-- Overlay -->
  <div class="overlay"></div>

</body>

</html>