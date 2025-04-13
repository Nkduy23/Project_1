<?php
require_once __DIR__ . '/../../Core/Autoload.php';
require_once __DIR__ . '/../../Core/Constants.php';

use Admin\Controllers\AdminCustomerController;

require_once __DIR__ . '/../../Config/Database.php';

// Lấy kết nối PDO từ class Database
$pdo = Database::getInstance()->getConnection();

$adminCustomerModel = new \Admin\Models\AdminCustomerModel($pdo);

$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? '';

switch ($action) {
    case 'create':
        $data = $_POST;
        $image = $_FILES['HinhAnh'] ?? null;
        $role = isset($_POST['VaiTro']) ? (int)$_POST['VaiTro'] : null;
        $categoryFolders = [
            0 => 'customer',
            1 => 'admin'
        ];

        $folder = $categoryFolders[$role] ?? 'other';
        $uploadDir = PUBLIC_PATH . "/img/$folder";
        $publicPath = "$folder";

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // tạo folder nếu chưa có
        }

        if ($image && $image['error'] === UPLOAD_ERR_OK) {
            $originalName = basename($image['name']);
            $uploadPath = "$uploadDir/$originalName"; // đường dẫn góc / tên hình
            $imagePathForDb = "$publicPath/$originalName"; // folder + tên hình

            move_uploaded_file($image['tmp_name'], $uploadPath);
            $data['HinhAnh'] = $imagePathForDb;
        }
        $controller = new AdminCustomerController($adminCustomerModel);
        $controller->create($data);
        break;
    case 'get':
        $controller = new AdminCustomerController($adminCustomerModel);
        $controller->get($id);
        break;
    case 'update':
        $data = $_POST;
        $image = $_FILES['HinhAnh'] ?? null;
        $role = $_POST['VaiTro'] ?? null;
        $categoryFolders = [
            0 => 'customer',
            1 => 'admin'
        ];

        $folder = $categoryFolders[$role] ?? 'other';
        $uploadDir = PUBLIC_PATH . "/img/$folder";
        $publicPath = "$folder";

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // tạo folder nếu chưa có
        }

        if ($image && $image['error'] === UPLOAD_ERR_OK) {
            $originalName = basename($image['name']);
            $uploadPath = "$uploadDir/$originalName"; // đường dẫn góc / tên hình
            $imagePathForDb = "$publicPath/$originalName"; // folder + tên hình

            move_uploaded_file($image['tmp_name'], $uploadPath);
            $data['HinhAnh'] = $imagePathForDb;
        } else {
            $data['HinhAnh'] = $_POST['OldImage'];
        }
        $controller = new AdminCustomerController($adminCustomerModel);
        $controller->update($data);
        break;
    case 'delete':
        $id = $_GET['id'] ?? '';
        $controller = new AdminCustomerController($adminCustomerModel);
        $success = $controller->delete($id);
        echo json_encode(['success' => $success]);
        break;
    default:
        echo "Invalid action";
        break;
}
