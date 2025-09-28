<?php

namespace App\Controller;

use App\Model\Category;
use App\View;

class CategoryController extends CrudController
{
    private string $resource = "categories";

    public function index(): void
    {
        $categories = Category::all();

        View::render("$this->resource/index", ["categories" => $categories]);
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

            $category = new Category();
            $category->setName($name);
            $category->save();

            $this->redirect();
        }

        View::render("$this->resource/new");
    }

    public function edit(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $id = $_REQUEST["id"];
        $category = Category::find(["id" => $id]);

        if ($method === "POST") {
            $name = $_POST["name"];

            $category->setName($name);
            $category->save();

            $this->redirect();
        }

        View::render("$this->resource/edit", ["state" => $category]);
    }

    public function delete(): void
    {
        $id = $_REQUEST["id"];
        $category = Category::find(["id" => $id]);

        if (!$category) return;

        $category->delete();

        $this->redirect();
    }

    private function redirect(): void
    {
        $this->redirectTo("/$this->resource");
    }
}
