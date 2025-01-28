<?php

define('NSPACE', 'Sport');

spl_autoload_register(function ($class): void {
    $base_dir = __DIR__ . '/../';

    $len = strlen(NSPACE);
    if (strncmp(NSPACE, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr(strtolower($class), $len);

    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    error_log($base_dir . ' ---' . $relative_class  . '---- ' . $file);

    if (file_exists($file)) {
        require_once $file;
    }
});

