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
  <link rel="stylesheet" href="../public/assets/css/main.css" />
  <link rel="stylesheet" href="../public/assets/css/home.css" />
</head>

<body>
  <header class="header">
    <div class="header__top">
      <p>Bộ Sưu Tập Đồng Hồ Mới Về</p>
    </div>
    <div class="header__bottom flex-between">
      <div class="header__menu">
        <i class="fa-solid fa-bars bar"></i>
      </div>
      <div class="header__logo">
        <a href="?page=home"><img src="../public/assets/img/logo.png" alt="logo Khánh Duy" /></a>
      </div>
      <div class="header__search flex-center gap-16">
        <div class="header__search-input">
          <input type="text" placeholder="Tìm kiếm..." />
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div class="header__cart flex-center gap-16">
          <div class="header__cart-left">
            <i class="fa-solid fa-bag-shopping"></i>
            <span class="flex-center">0</span>
          </div>
          <div class="header__cart-right">
            <i class="fa-solid fa-user"></i>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Search input mobile -->
  <div class="search-input-mobile">
    <div class="search-input">
      <input type="text" placeholder="Tìm kiếm sản phẩm hoặc thương hiệu" />
      <i class="fa-solid fa-magnifying-glass"></i>
    </div>
  </div>

  <!-- Nav Desktop -->
  <div class="container-fluid-nav">
    <div class="container-nav">
      <nav class="nav-desktop">
        <ul class="nav__list flex-between flex-wrap">
          <li class="nav__item" aria-haspopup="true" role="menu">
            <a class="nav__link" href="?page=brand">Thương Hiệu</a>
            <div class="nav__sub-wrap flex justify-center">
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">KOI</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">G-Shock</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Baby-G</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Fossil</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">SR Watch</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Orient</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC DÒNG ĐẶC BIỆT</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Phiên bản giới hạn (Limited Editon)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Đồng hồ quân đội</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Đồng hồ điện tử</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Đồng hồ đính kim cương</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Đồng hồ xà cừ</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Đồng hồ trẻ em</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Đồng hồ Nhật Bản</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">SWISS MADE (THỤY SỸ)</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Longines</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Doxa</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Titoni</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Tissot</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Rado</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Doxa</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Frederique Constant</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">THƯƠNG HIỆU KHÁC</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Calvin Klein</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Mido</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Certina</a></li>
              </ul>
            </div>
          </li>
          <li class="nav__item">
            <a class="nav__link" href="?page=men">Nam</a>
            <div class="nav__sub-wrap flex justify-center">
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">KHOẢNG GIÁ</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Dưới 2tr</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">2tr - 3tr</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">3tr - 4tr</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">4tr - 5tr</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Trên 5tr</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CHẤT LIỆU DÂY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Dây kim loại nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Dây da nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Dây cao su nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Dây Titanium nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Dây vải nam</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">THƯƠNG HIỆU</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">KOI nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Orient nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">G-Shock</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">SWISS MADE (THỤY SỸ)</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Longines nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Doxa nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Titoni nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Tissot nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Frederique Constant nam</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC DÒNG ĐẶC BIỆT</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Đồng hồ Nhật Bản nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Đồng hồ siêu mỏng nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Đồng hồ kim cương nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Đồng hồ cơ nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Đồng hồ vàng 18K nam</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Đồng hồ đính đá nam</a></li>
              </ul>
            </div>
          </li>
          <li class="nav__item">
            <a class="nav__link" href="?page=women">Nữ</a>
            <div class="nav__sub-wrap flex justify-center">
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
            </div>
          </li>
          <li class="nav__item">
            <a class="nav__link" href="?page=couple">Cặp Đôi</a>
            <div class="nav__sub-wrap flex justify-center">
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
            </div>
          </li>
          <li class="nav__item">
            <a class="nav__link" href="?page=jewelry">Trang Sức</a>
            <div class="nav__sub-wrap flex justify-center">
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
            </div>
          </li>
          <li class="nav__item">
            <a class="nav__link" href="?page=accessory">Phụ Kiện</a>
            <div class="nav__sub-wrap flex justify-center">
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
            </div>
          </li>
          <li class="nav__item">
            <a class="nav__link" href="?page=contact">Liên Hệ</a>
            <div class="nav__sub-wrap flex justify-center">
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
            </div>
          </li>
          <li class="nav__item">
            <a class="nav__link" href="?page=new">Tin Tức</a>
            <div class="nav__sub-wrap flex justify-center">
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
              <ul class="nav__sub" role="menuitem">
                <li class="nav__sub-title">CÁC HÃNG BÁN CHẠY</li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Daniel Wellington (DW)</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Seiko</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Saga</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Sokolov</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Casio</a></li>
                <li class="nav__item-sub"><a class="nav__link-sub" href="#">Citizen</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </div>

  <!-- Nav Mobile -->
  <div class="wrapper">
    <nav class="nav-mobile">
      <div class="nav-mobile__title">
        <span>Menu</span>
      </div>
      <div class="nav-mobile__list">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="#" class="nav__link">Thương Hiệu</a>
            <ul class="nav__sub">
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
            </ul>
          </li>
        </ul>
        <div class="nav__dropdown">
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </div>
      <div class="nav-mobile__list">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="#" class="nav__link">Thương Hiệu</a>
            <ul class="nav__sub">
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
            </ul>
          </li>
        </ul>
        <div class="nav__dropdown">
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </div>
      <div class="nav-mobile__list">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="#" class="nav__link">Thương Hiệu</a>
            <ul class="nav__sub">
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
            </ul>
          </li>
        </ul>
        <div class="nav__dropdown">
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </div>
      <div class="nav-mobile__list">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="#" class="nav__link">Thương Hiệu</a>
            <ul class="nav__sub">
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
            </ul>
          </li>
        </ul>
        <div class="nav__dropdown">
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </div>
      <div class="nav-mobile__list">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="#" class="nav__link">Thương Hiệu</a>
            <ul class="nav__sub">
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
            </ul>
          </li>
        </ul>
        <div class="nav__dropdown">
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </div>
      <div class="nav-mobile__list">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="#" class="nav__link">Thương Hiệu</a>
            <ul class="nav__sub">
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
            </ul>
          </li>
        </ul>
        <div class="nav__dropdown">
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </div>
      <div class="nav-mobile__list">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="#" class="nav__link">Thương Hiệu</a>
            <ul class="nav__sub">
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
            </ul>
          </li>
        </ul>
        <div class="nav__dropdown">
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </div>
      <div class="nav-mobile__list">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="#" class="nav__link">Thương Hiệu</a>
            <ul class="nav__sub">
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
            </ul>
          </li>
        </ul>
        <div class="nav__dropdown">
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </div>
      <div class="nav-mobile__list">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="#" class="nav__link">Thương Hiệu</a>
            <ul class="nav__sub">
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
              <li class="nav__item-sub"><a href="#" class="nav__link-sub">Sản Phẩm 1</a></li>
            </ul>
          </li>
        </ul>
        <div class="nav__dropdown">
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </div>

      <div class="nav-mobile__icon flex-center">
        <div class="icon-bag">
          <i class="fa-solid fa-bag-shopping"></i>
        </div>
        <div class="icon-phone">
          <i class="fa-solid fa-phone"></i>
        </div>
      </div>
    </nav>
  </div>
  <div class="overlay"></div>
</body>

</html>