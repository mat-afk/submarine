<?php

class Router
{

    private $routes = [];

    public function get(string $path, $controller, string $action)
    {
        $this->routes["GET"][$path] = [$controller, $action];
    }

    public function post(string $path, $controller, string $action)
    {
        $this->routes["POST"][$path] = [$controller, $action];
    }

    public function dispatch()
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        if (!isset($this->routes[$method][$path])) {
            http_response_code(404);
            echo "<h1>Página não encontrada.</h1><p>O servidor não conseguiu encontrar nenhum página associada a essa URL. <a href='/'>Voltar para /</a></p>";
            return;
        }

        [$controller, $action] = $this->routes[$method][$path];

        call_user_func([$controller, $action]);
    }
}
