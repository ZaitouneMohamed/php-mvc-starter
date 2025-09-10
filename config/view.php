<?php


if (!function_exists('view')) {
    function view(string $name, $data = []): void
    {
        $path = __DIR__ . '/../views/' . $name . '.php';

        if (file_exists($path)) {
            extract($data); 
            require $path;
        } else {
            
            echo "View '$path' not found.";
        }
    }
}
