<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . "/../src/autoload.php";

use App\Controller\AuthController;
use App\Controller\BookController;
use App\Controller\CategoryController;
use App\Controller\AuthorController;
use App\Controller\RatingController;

use App\Middleware\AuthMiddleware;
use App\Router;

Router::get("/", AuthController::class, "index");
Router::route("/login", AuthController::class, "login");
Router::route("/register", AuthController::class, "register");

Router::group([AuthMiddleware::class], function () {
    Router::resource("/books", BookController::class);
    Router::resource("/categories", CategoryController::class);
    Router::resource("/authors", AuthorController::class);
    Router::resource("/ratings", RatingController::class);
});

Router::dispatch($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);
