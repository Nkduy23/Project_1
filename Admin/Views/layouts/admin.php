<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= $GLOBALS['baseUrl'] ?>css/admin.css?v=<?= time(); ?>">
</head>

<body class="admin-layout">
  <div class="admin-layout__container">
    <nav class="admin-sidebar">
      <ul class="admin-sidebar__menu">
        <li class="admin-sidebar__item"><a href="/admin" class="admin-sidebar__link">Biểu đồ doanh thu</a></li>
        <li class="admin-sidebar__item"><a href="/admin/products" class="admin-sidebar__link">Quản lý sản phẩm</a></li>
        <li class="admin-sidebar__item"><a href="/admin/orders" class="admin-sidebar__link">Quản lý đơn hàng</a></li>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize Pie Chart
      const pieCtx = document.getElementById('pieChart').getContext('2d');
      const pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
          labels: ['Thương hiệu', 'Đồng hồ nam', 'Đồng hồ nữ', 'Cặp đôi', 'Trang sức','Phụ kiện'],
          datasets: [{
            data: [35, 25, 20, 15, 5],
            backgroundColor: [
              '#4e73df',
              '#1cc88a',
              '#36b9cc',
              '#f6c23e',
              '#e74a3b'
            ],
            hoverBackgroundColor: [
              '#2e59d9',
              '#17a673',
              '#2c9faf',
              '#dda20a',
              '#be2617'
            ],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          }],
        },
        options: {
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'right',
              labels: {
                usePointStyle: true,
                padding: 20
              }
            },
            tooltip: {
              backgroundColor: "rgb(255,255,255)",
              bodyColor: "#858796",
              titleMarginBottom: 10,
              titleColor: '#6e707e',
              titleFontSize: 14,
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              intersect: false,
              mode: 'index',
              caretPadding: 10,
              callbacks: {
                label: function(context) {
                  const label = context.label || '';
                  const value = context.raw || 0;
                  return `${label}: ${value}%`;
                }
              }
            }
          },
          cutout: '70%',
        },
      });
    });
  </script>
</body>

</html>