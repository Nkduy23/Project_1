<?php
require_once __DIR__ . '/../../controllers/CartController.php';

// ✅ Gọi controller thay vì xử lý trực tiếp
$cartController = new CartController();
$cartController->addToCart();
