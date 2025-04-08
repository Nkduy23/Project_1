<?php
$dependencies = require __DIR__ . '/../../Config/dependencies.php';
$cartController = $dependencies['cartController'];
$cartController->addToCart();
