<?php
$page = $_GET['page'] ?? 'home';
$file = "pages/{$page}.php";

if (file_exists($file)) {
    include_once 'layouts/header.php';
    include_once $file;
    include_once 'layouts/footer.php';
} else {
    include_once '404.php';
}
?>
