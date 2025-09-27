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

$authController = new AuthController();
$authMiddleware = new AuthMiddleware();

Router::get("/", $authController, "index");
Router::route("/login", $authController, "login");
Router::route("/register", $authController, "register");

Router::group([$authMiddleware], function () {
    Router::resource("/books", new BookController());
    Router::resource("/categories", new CategoryController());
    Router::resource("/authors", new AuthorController());
    Router::resource("/ratings", new RatingController());
});

Router::dispatch($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);
