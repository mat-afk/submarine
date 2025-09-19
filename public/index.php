<?php

require __DIR__ . "/../src/Database.php";
require __DIR__ . "/../src/Router.php";

require __DIR__ . "/../src/Controller/AuthController.php";

$db = new Database(
    getenv("DB_HOST") ?: "db",
    getenv("DB_NAME") ?: "submarine",
    getenv("DB_USER") ?: "mysql",
    getenv("DB_PASSWORD") ?: "mysql",
);

$router = new Router();

$router->get("/", "AuthController@index");

$router->get("/login", "AuthController@login");

$router->get("/register", "AuthController@register");

$router->dispatch();
