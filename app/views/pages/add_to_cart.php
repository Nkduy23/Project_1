<?php
$dependencies = require __DIR__ . '/../../config/dependencies.php';
$cartController = $dependencies['cartController'];
$cartController->addToCart();