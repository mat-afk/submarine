<?php

use JetBrains\PhpStorm\NoReturn;

require_once __DIR__ . "/../View.php";
require_once __DIR__ . "/CrudController.php";

class CategoryController extends CrudController
{
    public function index(): void
    {
        View::render("categories/index");
    }

    public function new(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];

        if ($method === "POST") {
            $this->redirect();
        }

        View::render("categories/new");
    }

    public function edit(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $id = $_REQUEST["id"];

        if ($method === "POST") {
            $this->redirect();
        }

        View::render("categories/edit");
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
        $this->redirectTo("/categories");
    }
}
