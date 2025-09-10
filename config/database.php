<?php

return [
    "mysql" => [
        'host'     => $_ENV['DB_HOST']     ?? '127.0.0.1',
        'dbname'   => $_ENV['DB_DATABASE'] ?? 'posts',
        'user'     => $_ENV['DB_USERNAME'] ?? 'root',
        'password' => $_ENV['DB_PASSWORD'] ?? 'Abc@1234',
        'charset'  => $_ENV['DB_CHARSET']  ?? 'utf8mb4',
    ]
];
