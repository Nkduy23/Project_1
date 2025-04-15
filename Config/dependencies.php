<?php
// Gọi file model App
use App\Models\ProductModel;
use App\Models\MediaModel;
use App\Models\BrandModel;
use App\Models\NewsModel;
use App\Models\CartModel;
use App\Models\MenuModel;
use App\Models\AuthModel;
use App\Models\CommentModel;


// Gọi file model Admin
use Admin\Models\AdminProductModel;
use Admin\Models\AdminCustomerModel;
use Admin\Models\AdminCategoryProductModel;
use Admin\Models\AdminCommentModel;
use Admin\Models\AdminOrderModel;
use Admin\Models\AdminBrandModel;
use Admin\Models\AdminServiceModel;

//Gọi file controller
use App\Controllers\MenuController;
use App\Controllers\CartController;

require_once __DIR__ . './Database.php';

// Khởi tạo Database
$dbInstance = Database::getInstance();
$db = $dbInstance->getConnection();

// Khởi tạo Model App
$productModel = new ProductModel($db);
$mediaModel = new MediaModel($db);
$brandModel = new BrandModel($db);
$newsModel = new NewsModel($db);
$cartModel = new CartModel($db);
$menuModel = new MenuModel($db);
$AuthModel = new AuthModel($db);
$commentModel = new CommentModel($db);

// Khởi tạo Model Admin
$adminProductModel = new AdminProductModel($db);
$adminCustomerModel = new AdminCustomerModel($db);
$adminCategoryProductModel = new AdminCategoryProductModel($db);
$adminCommentModel = new AdminCommentModel($db);
$adminOrderModel = new AdminOrderModel($db);
$adminBrandModel = new AdminBrandModel($db);
$adminServiceModel = new AdminServiceModel($db);


// Khởi tạo Controller
$menuController = new MenuController($menuModel);
$cartController = new CartController($cartModel);

$dependencies = [
    'db' => $db,
    'productModel' => $productModel,
    'mediaModel' => $mediaModel,
    'brandModel' => $brandModel,
    'newsModel' => $newsModel,
    'cartModel' => $cartModel,
    'menuController' => $menuController,
    'cartController' => $cartController,
    'AuthModel' => $AuthModel,
    'commentModel' => $commentModel,

    'adminProductModel' => $adminProductModel,
    'adminCustomerModel' => $adminCustomerModel,
    'adminCategoryProductModel' => $adminCategoryProductModel,
    'adminCommentModel' => $adminCommentModel,
    'adminOrderModel' => $adminOrderModel,
    'adminBrandModel' => $adminBrandModel,
    'adminServiceModel' => $adminServiceModel

];

return $dependencies;
