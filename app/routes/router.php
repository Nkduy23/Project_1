<?php
require_once __DIR__ . '/../controllers/CallControllers.php';

$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? null;

// Kiểm tra nếu là trang UserController
if ($page === 'user' && $action) {
    if ($action === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $userController->register();
        exit;
    }

    if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $userController->login();
        exit;
    }
    exit;
}

echo '<pre>';
print_r($_GET);
echo '</pre>';

// Load trang tĩnh
$file = "pages/{$page}.php";
if (file_exists($file)) {
    include_once 'layouts/header.php';
    include_once $file;
    include_once 'layouts/footer.php';
} else {
    include_once '404.php';
}
