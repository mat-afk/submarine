<?php

namespace App\Controller;

use JetBrains\PhpStorm\NoReturn;
use App\View;

class CategoryController extends CrudController
{
    private string $resource = "categories";

    public function index(): void
    {
        View::render("$this->resource/index");
    }

    #[NoReturn]
    public function show(): void
    {
        $this->redirect();
    }

    public function new(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];

        if ($method === "POST") {
            $this->redirect();
        }

        View::render("$this->resource/new");
    }

    public function edit(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $id = $_REQUEST["id"];

        if ($method === "POST") {
            $this->redirect();
        }

        View::render("$this->resource/edit");
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
        $this->redirectTo("/$this->resource");
    }
}
