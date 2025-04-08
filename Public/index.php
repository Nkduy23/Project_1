<?php
session_start();

define('BASE_URL', '/assets/');
$GLOBALS['baseUrl'] = BASE_URL;

require_once __DIR__ . '/../Core/Autoload.php';
require_once __DIR__ . '/../Config/Database.php';

// 🚀 Load dependencies
$dependencies = require __DIR__ . '/../Config/dependencies.php';
$menuTree = $dependencies['menuController']->getAllMenusTree();
$cartCount = $dependencies['cartController']->getCartQuantity();

// 📦 URI xử lý
$uri = $_GET['uri'] ?? '/';

// 🔀 Điều hướng
if (strpos($uri, '/admin') === 0) {
    require_once __DIR__ . '/../Routes/admin.php';
} else {
    require_once __DIR__ . '/../Routes/web.php';
}

// 🧩 Kết hợp layout
function renderWithLayout($content, $layoutData = [])
{
    extract($layoutData);

    require __DIR__ . '/../App/Views/layouts/header.php';
    echo $content;
    require __DIR__ . '/../App/Views/layouts/footer.php';
}

ob_start();
$router->dispatch($uri);
$content = ob_get_clean();

// 🔄 Dữ liệu truyền vào layout
if (strpos($uri, '/admin') === 0) {
    require_once __DIR__ . '/../Admin/Views/layouts/admin.php';
} else {
    $layoutData = [
        'menuTree' => $menuTree,
        'cartCount' => $cartCount,
        'baseUrl'   => $GLOBALS['baseUrl']
    ];

    renderWithLayout($content, $layoutData);
}
