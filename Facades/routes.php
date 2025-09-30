<?php

//namespace Facades;

class Route
{
    private static array $routes = [];

    private static bool $middlewareIsCalled = false;

    private static $path = '';

    public static function get(string $path, string|array $callback): self
    {
        self::$path = $path;

        if (!isset(self::$routes['GET'][$path])) {
            self::$routes['GET'][$path] = [];
        }

        self::$routes['GET'][$path] = $callback;

        if (self::$middlewareIsCalled) {
            self::$routes['GET'][$path]["middlewareIsCalled"] = true;
        }
        
        return new self();
    }

    public static function dispatch(): void
    {
        $method = $_GET['_method'] ?? $_SERVER['REQUEST_METHOD'];
        $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (!isset(self::$routes[$method][$currentPath])) {
            self::handleNotFound();
            return;
        }

        $callback = self::$routes[$method][$currentPath];

        if (is_string($callback)) {
            call_user_func($callback);
        } elseif (is_array($callback) && count($callback) >= 2) {
            $controller = new $callback[0]();
            $method = $callback[1];

            if (!method_exists($controller, $method)) {
                echo "Method '$method' not found in controller '" . get_class($controller) . "'.";
                return;
            }

            $controller->$method();
        }
    }

    private static function handleNotFound(): void
    {
        http_response_code(404);
        echo "404 - Route not found";
    }


    public function middleware(string $callback): void
    {
        self::$middlewareIsCalled = true;

        $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

       // echo $currentPath . "<br>";

        if ($currentPath == self::$path) {
            # code...
            if (is_string($callback)) {
                $middleware = new $callback();
                if (method_exists($middleware, "handle")) {
                    $middleware->handle();
                }
            }
        }
    }

    private static function methodNotAllowed(string $notAllowedMethod , string $allowedMethod): void
    {
        http_response_code(405);
        echo "method " . $notAllowedMethod . " not supported on this route. Allowed method is " . $allowedMethod;
    }


}
