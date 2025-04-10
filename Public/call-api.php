<?php
require_once __DIR__ . '/../Core/Autoload.php';
ini_set('display_errors', 0); // ẩn thông báo lỗi
ini_set('display_startup_errors', 1);
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
        $data = $_POST;
        $image = $_FILES['HinhAnh'] ?? null;
        $categoryId = $_POST['MaDanhMucSanPham'] ?? null;
        // ❗️Lấy tên thư mục dựa vào mã danh mục
        $categoryFolders = [
            1 => 'brand',
            2 => 'male',
            3 => 'female',
            4 => 'couple',
            5 => 'jewelry',
            6 => 'accessory',
            7 => 'contact',
            8 => 'news',
            9 => 'leather'
        ];

        $folder = $categoryFolders[$categoryId] ?? 'other'; // fallback nếu không đúng mã danh mục
        $uploadDir = __DIR__ . "/img/product/$folder"; // nơi lưu ảnh
        $publicPath = "$folder"; // phần đường dẫn lưu trong CSDL

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // tạo folder nếu chưa có
        }

        if ($image && $image['error'] === UPLOAD_ERR_OK) {
            $originalName = basename($image['name']);
            $uploadPath = "$uploadDir/$originalName";
            $imagePathForDb = "$publicPath/$originalName";

            move_uploaded_file($image['tmp_name'], $uploadPath) ;
            $data['HinhAnh'] = $imagePathForDb;

            // ❗️Xoá ảnh cũ nếu có
            if (!empty($_POST['OldImage'])) {
                $oldImagePath = __DIR__ . '/img/product/' . $_POST['OldImage'];
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        } else {
            $data['HinhAnh'] = $_POST['OldImage']; // giữ ảnh cũ nếu không có ảnh mới
        }

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
