<?php
$module = $_GET['module'] ?? '';

switch ($module) {
    case 'product':
        require_once __DIR__ . '/../Admin/Routes/productApi.php';
        break;
    case 'customer':
        require_once __DIR__ . '/../Admin/Routes/customerApi.php';
        break;
    case 'category':
        require_once __DIR__ . '/../Admin/Routes/categoryApi.php';
        break;
    default:
        echo json_encode(['error' => 'Module không hợp lệ']);
        break;
}
