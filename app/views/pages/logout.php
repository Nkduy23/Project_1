<?php
// Kiểm tra nếu session chưa được khởi tạo
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Hủy session
$_SESSION = [];
session_destroy();

// Kiểm tra nếu headers đã gửi trước khi redirect
if (!headers_sent()) {
    header('Location: /');
    exit;
} else {
    echo "<script>window.location.href='/'</script>";
    exit;
}
