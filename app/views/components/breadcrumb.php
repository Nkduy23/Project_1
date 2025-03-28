<?php
require_once __DIR__ . '/../../controllers/Controllers.php';

/**
 * Lấy tên rút gọn của sản phẩm từ tên đầy đủ.
 */
function getShortProductName($productName)
{
    preg_match('/^([A-Za-z]+\s\w+)/', $productName, $matches);
    return $matches[1] ?? $productName;
}

function getBreadcrumb()
{
    global $productController;

    // Lấy tham số từ URL
    $page = $_GET['page'] ?? 'home';
    $category = $_GET['category'] ?? null;
    $type = $_GET['type'] ?? null;
    $productId = $_GET['id'] ?? null;

    // Danh sách danh mục cố định
    $categories = [
        "home" => ["title" => "Trang chủ", "slug" => "/"],
        "male" => ["title" => "Đồng Hồ Nam", "slug" => "/male"],
        "female" => ["title" => "Đồng Hồ Nữ", "slug" => "/female"],
        "jewelry" => ["title" => "Trang Sức Thời Trang", "slug" => "/jewelry"],
        "leather" => ["title" => "Đồ Da Thật Cao Cấp", "slug" => "/leather"],
    ];

    echo '<nav class="breadcrumb">';
    echo '<a href="/" class="breadcrumb__link">Trang chủ</a>';

    // Nếu trang thuộc danh mục
    if (isset($categories[$page])) {
        echo ' / <a href="' . htmlspecialchars($categories[$page]['slug']) . '" class="breadcrumb__link">'
            . htmlspecialchars($categories[$page]['title']) . '</a>';
    }

    // Nếu có category và type
    if ($category && $type) {
        echo ' / <a href="/' . htmlspecialchars($page) . '/' . htmlspecialchars($category) . '/' . htmlspecialchars($type) . '" class="breadcrumb__link">'
            . ucfirst(htmlspecialchars($type)) . '</a>';
    }

    // Nếu là trang chi tiết sản phẩm
    if ($page === "detail" && $productId) {
        $product = $productController->getProductById($productId);

        if ($product) {
            // Ánh xạ category_id sang danh mục tương ứng
            $categoryMapping = [
                1 => "male",
                2 => "female",
                3 => "jewelry",
                4 => "leather"
            ];
            $categoryKey = $categoryMapping[$product['category_id']] ?? "male"; // Mặc định là "male"
            $categoryData = $categories[$categoryKey] ?? null;

            // Hiển thị danh mục (Đồng Hồ Nam / Đồng Hồ Nữ...)
            if (!empty($categoryData)) {
                echo ' / <a href="' . htmlspecialchars($categoryData['slug']) . '" class="breadcrumb__link">'
                    . htmlspecialchars($categoryData['title']) . '</a>';
            }

            $baseUrl = 'http://project_1.test/'; // Định nghĩa base URL

            $categorySlug = !empty($categoryData['slug']) ? htmlspecialchars($categoryData['slug']) : 'male';
            $brandName = !empty($product['brand']) ? htmlspecialchars($product['brand']) : 'unknown';

            // Hiển thị thương hiệu (Casio / Seiko...)
            if (!empty($product['brand'])) {
                // Hiển thị thương hiệu (Casio / Seiko...)
                echo ' / <a href="' . $baseUrl . $categorySlug . '/brand/' . $brandName . '" class="breadcrumb__link">'
                    . ucfirst($brandName) . '</a>';
            }

            // Lấy tên rút gọn của sản phẩm
            $productShortName = !empty($product['short_name']) ? $product['short_name'] : getShortProductName($product['name'] ?? '');
            if (!empty($productShortName)) {
                echo ' / <span class="breadcrumb__current">' . htmlspecialchars($productShortName) . '</span>';
            }
        }
    }


    echo '</nav>';
}
