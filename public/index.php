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
$pdo = $db->getConnection();

$authController = new AuthController($pdo);

$router = new Router();

$router->get("/", $authController, "index");
$router->get("/login", $authController, "login");
$router->get("/register", $authController, "register");

$router->dispatch();
