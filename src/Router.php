<?php

namespace App;

class Router
{
    private static array $routes = [];
    private static array $currentGroupMiddlewares = [];

    private static function addRoute(string $method, string $path, $controllerClass, string $action, array $middlewares = []): void
    {
        $middlewares = array_merge(static::$currentGroupMiddlewares, $middlewares);

        static::$routes[$method][$path] = [$controllerClass, $action, $middlewares];
    }

    public static function resource(string $baseUrl, $controller, array $middlewares = []): void
    {
        static::get($baseUrl, $controller, "index", $middlewares);
        static::get("$baseUrl/show", $controller, "show", $middlewares);
        static::route("$baseUrl/new", $controller, "new", $middlewares);
        static::route("$baseUrl/edit", $controller, "edit", $middlewares);
        static::post("$baseUrl/delete", $controller, "delete", $middlewares);
    }

    public static function route(string $path, $controller, string $action, array $middlewares = []): void
    {
        static::addRoute("GET", $path, $controller, $action, $middlewares);
        static::addRoute("POST", $path, $controller, $action, $middlewares);
    }

    public static function get(string $path, $controller, string $action, array $middlewares = []): void
    {
        static::addRoute("GET", $path, $controller, $action, $middlewares);
    }

    public static function post(string $path, $controller, string $action, array $middlewares = []): void
    {
        static::addRoute("POST", $path, $controller, $action, $middlewares);
    }

    public static function group(array $middlewares, callable $callback): void
    {
        $previousMiddlewares = static::$currentGroupMiddlewares;

        static::$currentGroupMiddlewares = array_merge($previousMiddlewares, $middlewares);

        $callback();

        static::$currentGroupMiddlewares = $previousMiddlewares;
    }

    public static function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH);

        if (!isset(static::$routes[$method][$path])) {
            http_response_code(404);
            View::render("404");
            return;
        }

        [$controllerClass, $action, $middlewares] = static::$routes[$method][$path];

        $controller = new $controllerClass();

        $next = fn() => call_user_func([$controller, $action]);

        foreach (array_reverse($middlewares) as $middlewareClass) {
            $middleware = new $middlewareClass();
            $next = fn() => $middleware->handle($next);
        }

        $next();
    }
}
