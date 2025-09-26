<?php

namespace App\Controller;

use JetBrains\PhpStorm\NoReturn;
use App\View;

class BookController extends CrudController
{
    private string $resource = "books";

    public function index(): void
    {
        View::render("$this->resource/index");
    }

    public function show(): void
    {
        View::render("$this->resource/show");
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