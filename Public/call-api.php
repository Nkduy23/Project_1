<?php
require_once __DIR__ . '/../Core/Autoload.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

use Admin\Controllers\AdminProductController;

require_once __DIR__ . '/../Config/Database.php';
// Lấy kết nối PDO từ class Database
$pdo = Database::getInstance()->getConnection();
$adminProductModel = new \Admin\Models\AdminProductModel($pdo); // 💡 Nhớ use hoặc thêm namespace

$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? '';

switch ($action) {
    case 'get':
        $controller = new AdminProductController($adminProductModel);
        $controller->get($id);
        break;
    case 'update':
        $data = json_decode(file_get_contents("php://input"), true);
        $controller = new AdminProductController($adminProductModel);
        $controller->update($data);
        break;
    case 'delete':
        $id = $_GET['id'] ?? '';
        $controller = new AdminProductController($adminProductModel);
        $success = $controller->delete($id);
        echo json_encode(['success' => $success]);
        break;
    default:
        echo "Duy đẹp mặc định";
        break;
}
