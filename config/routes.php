<?php
class Route
{
    private static bool $matched = false;

    private static $requestMethod;
    private static $requestPath;

    private static $middleware = null;
    private static $currentCallback = null;
    private static bool $middlewareExecuted = false;


    public static function init(): void
    {
        self::$requestMethod = $_SERVER['REQUEST_METHOD'];
        self::$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        register_shutdown_function([self::class, 'dispatch']);
    }

    public static function get($path, $callback)
    {
        if (self::$requestPath === $path) {
            if (self::$requestMethod === 'GET' && !self::$matched) {
                self::$matched = true;
                // Controller method format
                if (is_array($callback) && count($callback) === 2) {
                    [$controllerClass, $method] = $callback;

                    if (class_exists($controllerClass)) {
                        $controllerInstance = new $controllerClass();

                        if (method_exists($controllerInstance, $method)) {
                            call_user_func([$controllerInstance, $method]);
                            return new self();
                        } else {
                            echo "Method '$method' not found in controller '$controllerClass'.";
                        }
                    } else {
                        echo "Controller class '$controllerClass' not found.";
                    }
                }

                // Closure
                elseif (is_callable($callback)) {
                    call_user_func($callback);
                } else {
                    echo "Invalid callback for GET route.";
                }
            } elseif (!self::$matched) {
                self::$matched = true;
                self::methodNotAllowed(['GET']);
            }
        }

        return new self(); // Enables ->middleware() chaining
    }




    public static function post($path, $callback): void
    {
        if (self::$requestPath === $path) {
            if (self::$requestMethod === 'POST' && !self::$matched) {
                self::$matched = true;
                $callback();
            } elseif (!self::$matched) {
                self::$matched = true;
                self::methodNotAllowed(['POST']);
            }
        }
    }

    private static function methodNotAllowed(array $allowedMethods): void
    {
        http_response_code(405);
        header('Allow: ' . implode(', ', $allowedMethods));
        echo self::$requestMethod . " not supported on this route. Allowed method(s): " . implode(', ', $allowedMethods);
    }

    public static function dispatch($statusCode = 404, $message = "Not Found"): void
    {
        if (!self::$matched) {
            http_response_code($statusCode);
            view((string)$statusCode, ['message' => $message]);
        }
    }

    public function middleware(string $name): void
    {
        self::$middleware = $name;

        $middlewareFile = __DIR__ . '/../middleware/' . $name . '.php';

        if (file_exists($middlewareFile)) {
            require_once $middlewareFile;

            // If middleware did NOT exit, run the route callback
            if (self::$currentCallback && !self::$middlewareExecuted) {
                call_user_func(self::$currentCallback);
                self::$middlewareExecuted = true;
            }
        } else {
            echo "Middleware '$name' not found.";
            exit;
        }
    }
}
