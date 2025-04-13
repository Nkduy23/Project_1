<?php
require_once __DIR__ . '/../../Core/Autoload.php';
require_once __DIR__ . '/../../Core/Constants.php';

use Admin\Controllers\AdminCategoryProductController;

require_once __DIR__ . '/../../Config/Database.php';

// Lấy kết nối PDO từ class Database
$pdo = Database::getInstance()->getConnection();
$adminCategoryProductModel = new Admin\Models\AdminCategoryProductModel($pdo);

$action = $_GET['action'] ?? '';    
$id = $_GET['id'] ?? '';

switch ($action) {
    case 'create':
        $data = $_POST;
        $controller = new AdminCategoryProductController($adminCategoryProductModel);
        $controller->create($data);
        break;
    case 'get':
        $controller = new AdminCategoryProductController($adminCategoryProductModel);
        $controller->get($id);
        break;
    case 'update':
        $data = $_POST;
        $controller = new AdminCategoryProductController($adminCategoryProductModel);
        $controller->update($data);
        break;
    case 'delete':
        $controller = new AdminCategoryProductController($adminCategoryProductModel);
        $controller->delete($id);
        break;
    default:
        echo "Invalid action: ";
        break;
}
