<?php

$id = $_GET['id'] ?? null;

if ($id) {
    echo "<h2>Chi tiết sản phẩm #{$id}</h2>";
    // Truy vấn database để lấy chi tiết sản phẩm
    // Ví dụ:
    // $product = getProductById($id);
    // echo "<h2>{$product['name']}</h2>";
} else {
    echo "<h2>Không tìm thấy sản phẩm!</h2>";
}
