<?php
require_once __DIR__ . '/../Core/Autoload.php';


use Admin\Controllers\AdminProductController;


require_once __DIR__ . '/../Config/Database.php';
// Lấy kết nối PDO từ class Database
$pdo = Database::getInstance()->getConnection();

$adminProductModel = new \Admin\Models\AdminProductModel($pdo);

$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? '';

switch ($action) {
    case 'create':
        $data = $_POST;
        $image = $_FILES['HinhAnh'] ?? null;
        $imageHover = $_FILES['HinhAnhHover'] ?? null;
        $categoryId = $_POST['MaDanhMucSanPham'] ?? null;
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

        $folder = $categoryFolders[$categoryId] ?? 'other';
        $uploadDir = __DIR__ . "/../public/assets/img/product/$folder"; // đường dẫn vật lý
        $publicPath = "$folder"; // ✅ chỉ là "male", "female", v.v.

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // tạo folder nếu chưa có
        }

        // Xử lý ảnh chính 
        if ($image && $image['error'] === UPLOAD_ERR_OK) {
            $originalName = uniqid() . '-' . basename($image['name']);
            $uploadPath = "$uploadDir/$originalName";
            $imagePathForDb = "$publicPath/$originalName";

            // Di chuyển từ muc tạm của PHP đến nơi lưu cố định
            move_uploaded_file($image['tmp_name'], $uploadPath);
            // Gán đường dẫn ảnh vào $data để chuẩn bị lưu vào database
            $data['HinhAnh'] = $imagePathForDb;
        }

        if ($imageHover && $imageHover['error'] === UPLOAD_ERR_OK) {
            $originalNameHover = uniqid() . '-' . basename($imageHover['name']);
            $uploadPathHover = "$uploadDir/$originalNameHover";
            $imageHoverPathForDb = "$publicPath/$originalNameHover";

            move_uploaded_file($imageHover['tmp_name'], $uploadPathHover);
            $data['HinhAnhHover'] = $imageHoverPathForDb;
        }


        $controller = new AdminProductController($adminProductModel);
        $controller->create($data);
        break;

    case 'get':
        $controller = new AdminProductController($adminProductModel);
        $controller->get($id);
        break;

    case 'update':
        $data = $_POST;
        $image = $_FILES['HinhAnh'] ?? null;
        $categoryId = $_POST['MaDanhMucSanPham'] ?? null;
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

        $folder = $categoryFolders[$categoryId] ?? 'other';
        $uploadDir = __DIR__ . "/img/product/$folder";
        $publicPath = "$folder";

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // tạo folder nếu chưa có
        }

        if ($image && $image['error'] === UPLOAD_ERR_OK) {
            $originalName = basename($image['name']);
            $uploadPath = "$uploadDir/$originalName";
            $imagePathForDb = "$publicPath/$originalName";

            move_uploaded_file($image['tmp_name'], $uploadPath);
            $data['HinhAnh'] = $imagePathForDb;

            if (!empty($_POST['OldImage'])) {
                $oldImagePath = __DIR__ . '/img/product/' . $_POST['OldImage'];
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        } else {
            $data['HinhAnh'] = $_POST['OldImage'];
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
        echo "Invalid action";
        break;
}
