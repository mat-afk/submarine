<?php

namespace App\Controller;

use App\View;

class RatingController extends CrudController
{
    private string $resource = "ratings";

    public function index(): void
    {
        View::render("$this->resource/index");
    }

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
        if ($method === "POST") {
            $this->redirect();
        }

        View::render("$this->resource/edit");
    }

    public function delete(): void
    {
        $this->redirect();
    }

    private function redirect(): void
    {
        $this->redirectTo("/$this->resource");
    }
}