<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="<?= $GLOBALS['baseUrl'] ?>css/admin.css">
</head>

<body class="admin-layout">
  <div class="admin-layout__container">
    <nav class="admin-sidebar">
      <ul class="admin-sidebar__menu">
        <li class="admin-sidebar__item"><a href="/admin" class="admin-sidebar__link">Biểu đồ doanh thu</a></li>
        <li class="admin-sidebar__item"><a href="/admin/products" class="admin-sidebar__link">Quản lý sản phẩm</a></li>
        <li class="admin-sidebar__item"><a href="/admin/categories" class="admin-sidebar__link">Quản lý loại</a></li>
        <li class="admin-sidebar__item"><a href="/admin/customers" class="admin-sidebar__link">Quản lý khách hàng</a></li>
        <li class="admin-sidebar__item"><a href="/admin/comments" class="admin-sidebar__link">Quản lý bình luận</a></li>
        <li class="admin-sidebar__item"><a href="/admin/services" class="admin-sidebar__link">Quản lý dịch vụ</a></li>
      </ul>
    </nav>

    <main class="admin-main">
      <header class="admin-header">
        <h1 class="admin-header__title">Trang Quản Trị</h1>
      </header>
      <div class="admin-content">
        <?= $content ?>
      </div>
    </main>
  </div>

  <script>
    // JS: Highlight active menu
    const links = document.querySelectorAll('.admin-sidebar__link');
    const currentUrl = window.location.pathname;

    links.forEach(link => {
      if (link.getAttribute('href') === currentUrl) {
        link.classList.add('admin-sidebar__link--active');
      }
    });
  </script>
</body>

</html>
