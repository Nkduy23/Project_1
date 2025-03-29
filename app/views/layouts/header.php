<?php
$baseUrl = "/app/public/assets/";
?>

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
  <link rel="stylesheet" href="<?= $baseUrl ?>css/main.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" href="<?= $baseUrl ?>css/home.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" href="<?= $baseUrl ?>css/detail.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" href="<?= $baseUrl ?>css/cart.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" href="<?= $baseUrl ?>css/auth.css?v=<?php echo time(); ?>" />
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
        <a href="/home"><img src="/app/public/assets/img/logo.png" alt="logo Khánh Duy" /></a>
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
              <span class="flex-center">0</span>
            </div>
          </a>
          <a href="/login">
            <div class="header__cart-right">
              <i class="fa-solid fa-user"></i>
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