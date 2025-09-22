<?php

require __DIR__ . "/../src/Database.php";
require __DIR__ . "/../src/Router.php";

require __DIR__ . "/../src/Controller/AuthController.php";
require __DIR__ . "/../src/Controller/BookController.php";
require __DIR__ . "/../src/Controller/CategoryController.php";
require __DIR__ . "/../src/Controller/AuthorController.php";
require __DIR__ . "/../src/Controller/RatingController.php";

$db = new Database(
    getenv("DB_HOST") ?: "db",
    getenv("DB_NAME") ?: "submarine",
    getenv("DB_USER") ?: "mysql",
    getenv("DB_PASSWORD") ?: "mysql",
);
$pdo = $db->getConnection();

$authController = new AuthController($pdo);
$bookController = new BookController($pdo);
$categoryController = new CategoryController($pdo);
$authorController = new AuthorController($pdo);
$ratingController = new RatingController($pdo);

Router::get("/", $authController, "index");
Router::route("/login", $authController, "login");
Router::route("/register", $authController, "register");

Router::resource("/books", $bookController);
Router::resource("/categories", $categoryController);
Router::resource("/authors", $authorController);
Router::resource("/ratings", $ratingController);

Router::dispatch($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);
