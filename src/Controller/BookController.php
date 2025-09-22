<?php

use JetBrains\PhpStorm\NoReturn;

require_once __DIR__ . "/../View.php";
require_once __DIR__ . "/../Controller.php";

class BookController extends Controller
{
    public function index(): void
    {
        View::render("books/index");
    }

    public function new(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];

        if ($method === "POST") {
            $this->redirect();
        }

        View::render("books/new");
    }

    public function edit(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $id = $_REQUEST["id"];

        if ($method === "POST") {
            $this->redirect();
        }

        View::render("books/edit");
    }

    #[NoReturn]
    public function delete(): void
    {
        $id = $_REQUEST["id"];

        $this->redirect();
    }

    #[NoReturn]
    private function redirect(): void
    {
        header("Location: /books");
        exit();
    }
}