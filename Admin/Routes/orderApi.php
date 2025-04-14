
<?php
require_once __DIR__ . '/../../Core/Autoload.php';
require_once __DIR__ . '/../../Core/Constants.php';

use Admin\Controllers\AdminOrderController;

require_once __DIR__ . '/../../Config/Database.php';

// Lấy kết nối PDO từ class Database
$pdo = Database::getInstance()->getConnection();
$adminOrderModel = new Admin\Models\AdminOrderModel($pdo);

$action = $_GET['action'] ?? '';    
$id = $_GET['id'] ?? '';

switch ($action) {
    case 'get':
        $controller = new AdminOrderController($adminOrderModel);
        $controller->get($id);
        break;
    case 'update':
        $data = $_POST;
        $controller = new AdminOrderController($adminOrderModel);
        $controller->update($data);
        break;
    case 'delete':
        $id = $_GET['id'] ?? '';
        $controller = new AdminOrderController($adminOrderModel);
        $success = $controller->delete($id);
        break;
    default:
    echo "Invalid action";
    break;
}
?>