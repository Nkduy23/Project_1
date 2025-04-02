<?php
// Gọi file model
use App\Models\ProductModel;
use App\Models\MediaModel;
use App\Models\BrandModel;
use App\Models\NewsModel;
use App\Models\CartModel;
use App\Models\MenuModel;
use App\Models\UserModel;

//Gọi file controller
use App\Controllers\MenuController;
use App\Controllers\CartController;

require_once __DIR__ . './Database.php';

// Khởi tạo Database
$dbInstance = Database::getInstance();
$db = $dbInstance->getConnection();

// Khởi tạo Model
$productModel = new ProductModel($db);
$mediaModel = new MediaModel($db);
$brandModel = new BrandModel($db);
$newsModel = new NewsModel($db);
$cartModel = new CartModel($db);
$menuModel = new MenuModel($db);
$userModel = new UserModel($db);


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
    'userModel' => $userModel
];

return $dependencies;