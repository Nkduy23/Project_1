<?php
spl_autoload_register(function ($class) {
    $namespaces = [
        'App\\' => dirname(__DIR__) . '/App/',
        'Admin\\' => dirname(__DIR__) . '/Admin/',
        'Core\\' => dirname(__DIR__) . '/Core/',
    ];

    foreach ($namespaces as $prefix => $base_dir) {
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) === 0) {
            $relative_class = substr($class, $len);
            $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

            if (file_exists($file)) {
                require $file;
                return;
            } else {
                echo "Autoload error: $file not found<br>";
            }
        }
    }
});
