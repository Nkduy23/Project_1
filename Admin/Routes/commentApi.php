<?php
require_once __DIR__ . '/../../Core/Autoload.php';
require_once __DIR__ . '/../../Core/Constants.php';

use Admin\Controllers\AdminCommentController;

require_once __DIR__ . '/../../Config/Database.php';

// Lấy kết nối PDO từ class Database
$pdo = Database::getInstance()->getConnection();
$adminCommentModel = new Admin\Models\AdminCommentModel($pdo);

$action = $_GET['action'] ?? '';    
$id = $_GET['id'] ?? '';

switch ($action) {
    case 'get':
        $controller = new AdminCommentController($adminCommentModel);
        $controller->get($id);
        break;
    case 'update':
        $data = $_POST;
        $controller = new AdminCommentController($adminCommentModel);
        $controller->update($data);
        break;
    case 'delete':
        $id = $_GET['id'] ?? '';
        $controller = new AdminCommentController($adminCommentModel);
        $success = $controller->delete($id);
        break;
    default:
    echo "Invalid action";
    break;
}
?>