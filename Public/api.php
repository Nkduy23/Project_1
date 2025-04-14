<?php
$module = $_GET['module'] ?? '';

switch ($module) {
    case 'product':
        require_once __DIR__ . '/../Admin/Routes/productApi.php';
        break;
    case 'order':
        require_once __DIR__ . '/../Admin/Routes/orderApi.php';
        break;
    case 'customer':
        require_once __DIR__ . '/../Admin/Routes/customerApi.php';
        break;
    case 'category':
        require_once __DIR__ . '/../Admin/Routes/categoryApi.php';
        break;
    case 'comment':
        require_once __DIR__ . '/../Admin/Routes/commentApi.php';
    default:
        echo json_encode(['error' => 'Module không hợp lệ']);
        break;
}
