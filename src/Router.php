<?php

require_once __DIR__ . "/../src/Controller.php";
require_once __DIR__ . "/../src/Controller/CrudController.php";

class Router
{
    private static array $routes = [];

    private static function addRoute(string $method, string $path, Controller $controller, string $action): void
    {
        static::$routes[$method][$path] = [$controller, $action];
    }

    public static function resource(string $baseUrl, CrudController $controller): void
    {
        static::get($baseUrl, $controller, "index");
        static::get("$baseUrl/show", $controller, "show");
        static::route("$baseUrl/new", $controller, "new");
        static::route("$baseUrl/edit", $controller, "edit");
        static::post("$baseUrl/delete", $controller, "delete");
    }

    public static function route(string $path, Controller $controller, string $action): void
    {
        static::addRoute("GET", $path, $controller, $action);
        static::addRoute("POST", $path, $controller, $action);
    }

    public static function get(string $path, Controller $controller, string $action): void
    {
        static::addRoute("GET", $path, $controller, $action);
    }

    public static function post(string $path, Controller $controller, string $action): void
    {
        static::addRoute("POST", $path, $controller, $action);
    }

    public static function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH);

        if (!isset(static::$routes[$method][$path])) {
            http_response_code(404);
            echo "
                <h1>Página não encontrada.</h1>
                <p>
                O servidor não conseguiu encontrar nenhum página associada a essa URL. <a href='/'>Voltar para /</a>
                </p>
            ";
            return;
        }

        [$controller, $action] = static::$routes[$method][$path];

        call_user_func([$controller, $action]);
    }
}
