<?php

session_start();

require __DIR__ . "/../src/autoload.php";

use App\Database;

use App\Controller\AuthController;
use App\Controller\BookController;
use App\Controller\CategoryController;
use App\Controller\AuthorController;
use App\Controller\RatingController;

use App\Middleware\AuthMiddleware;
use App\Router;

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

$authMiddleware = new AuthMiddleware();

Router::get("/", $authController, "index");
Router::route("/login", $authController, "login");
Router::route("/register", $authController, "register");

Router::group([$authMiddleware], function () use ($bookController, $categoryController, $authorController, $ratingController) {
    Router::resource("/books", $bookController);
    Router::resource("/categories", $categoryController);
    Router::resource("/authors", $authorController);
    Router::resource("/ratings", $ratingController);
});

Router::dispatch($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);
