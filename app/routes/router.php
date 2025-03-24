<?php
// Lấy thông tin từ URL (Pretty URL)
$page = $_GET['page'] ?? 'home';
$id = $_GET['id'] ?? null;

// Định nghĩa đường dẫn file của trang
$file = "pages/{$page}.php";

// Kiểm tra xem file có tồn tại không
if (file_exists($file)) {
    include_once 'layouts/header.php';
    include_once $file;
    include_once 'layouts/footer.php';
} else {
    include_once '404.php';
}
?>
