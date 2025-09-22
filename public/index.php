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

Router::get("/", $authController, "index");

Router::get("/login", $authController, "login");
Router::post("/login", $authController, "login");

Router::get("/register", $authController, "register");
Router::post("/register", $authController, "register");

Router::dispatch($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);
