<?php
session_start();
define('BASE_URL', '/assets/');
$GLOBALS['baseUrl'] = BASE_URL;

spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = dirname(__DIR__) . '/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    } else {
        echo ("Autoload error: File not found - " . $file);
    }
});

require_once __DIR__ . '/../config/router.php';

function renderWithLayout($content)
{
    require __DIR__ . '/../views/layouts/header.php';
    echo $content;

    require __DIR__ . '/../views/layouts/footer.php';
}

$uri = $_GET['uri'] ?? '/';

print_r($uri);

ob_start();

$router->dispatch($uri);

$content = ob_get_clean();

renderWithLayout($content, $baseUrl);
