<?php

$config = require_once __DIR__ . '/config/database.php';
function getPDOConnection(array $config)
{
    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

    try {
        $pdo = new PDO($dsn, $config['user'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

$pdo = getPDOConnection($config['mysql']);

if (!function_exists("Auth")) {
    function Auth(array $userData, int $sessionTime, string $role = "user")
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // Store user data
        $_SESSION['user'] = [
            'id'       => $userData['id'] ?? null,
            'username' => $userData['username'] ?? null,
            'email'    => $userData['email'] ?? null,
            'role'     => $role,
            'login_time' => time(),
            'expires_at' => time() + $sessionTime
        ];
    }
}
function isRoute($route)
{
    $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return $currentPath === $route;
}
