<?php
function getShortProductName($productName)
{
    preg_match('/^([A-Za-z]+\s\w+)/', $productName, $matches);
    return $matches[1] ?? $productName;
}

function getBreadcrumb($product = [])
{
    $page = $_SERVER['REQUEST_URI'];
    // Danh sách danh mục cố định
    $categories = [
        "home" => ["title" => "Trang chủ", "slug" => "/"],
        "male" => ["title" => "Đồng Hồ Nam", "slug" => "/products/male"],
        "female" => ["title" => "Đồng Hồ Nữ", "slug" => "/products/female"],
        "couple" => ["title" => "Cặp đôi", "slug" => "/products/couple"],
        "jewelry" => ["title" => "Trang Sức", "slug" => "/products/jewelry"],
        "leather" => ["title" => "Đồ Da", "slug" => "/products/leather"],
        "accessories" => ["title" => "Phụ Kiện", "slug" => "/products/accessories"],
        "cart" => ["title" => "Giỏ hàng", "slug" => "/cart"],

    ];

    echo '<nav class="breadcrumb">';
    echo '<a href="/" class="breadcrumb__link">Trang chủ</a>';
    echo '/';
    foreach ($categories as $slug => $category) {
        if (preg_match("#/{$slug}(/|$)#", $page)) {
            echo '<a href="' . $category["slug"] . '" class="breadcrumb__link">' . $category["title"] . '</a>';
        }
    }

    if (strpos($page, 'detail') !== false) {
        echo '<a href="/detail" class="breadcrumb__link">' . getShortProductName($product['TenSanPham']) . '</a>';
    }
    echo '</nav>';
}
