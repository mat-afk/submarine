<?php

namespace App\Controller;

use App\Model\Author;
use App\View;

class AuthorController extends CrudController
{
    private string $resource = "authors";

    public function index(): void
    {
        $authors = Author::all();

        View::render("$this->resource/index", ["authors" => $authors]);
    }

    public function show(): void
    {
        $this->redirect();
    }

    public function new(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];

        if ($method === "POST") {
            $name = $_POST["name"];

            $author = new Author();
            $author->setName($name);

            $author->save();

            $this->redirect();
        }

        View::render("$this->resource/new");
    }

    public function edit(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $id = $_REQUEST["id"];
        $author = Author::find(["id" => $id]);

        if ($method === "POST") {
            $name = $_POST["name"];

            $author->setName($name);
            $author->save();

            $this->redirect();
        }

        View::render("$this->resource/edit", ["state" => $author]);
    }

    public function delete(): void
    {
        $id = $_REQUEST["id"];
        $author = Author::find(["id" => $id]);

        if (!$author) return;

        $author->delete();

        $this->redirect();
    }

    private function redirect(): void
    {
        $this->redirectTo("/$this->resource");
    }
}
