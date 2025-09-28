<?php

namespace App\Controller;

use App\Model\Author;
use App\Model\Authorship;
use App\Model\Book;
use App\Model\Category;
use App\View;

class BookController extends CrudController
{
    private string $resource = "books";

    public function index(): void
    {
        $authorId = $_GET["author_id"] ?? null;
        $authorId = (int) $authorId;

        $categoryId = $_GET["category_id"] ?? null;
        $categoryId = (int) $categoryId;

        $minRating = $_GET["min_rating"] ?? 0;
        $minRating = (int) $minRating;

        $maxRating = $_GET["max_rating"] ?? 5;
        $maxRating = (int) $maxRating;

        $authors = Author::all();
        $categories = Category::all();

        $books = Book::filter($authorId, $categoryId, $minRating, $maxRating);

        $items = [];
        foreach ($books as $book) {
            $category = Category::find(["id" => $book->getCategoryId()]);
            $author = Author::find(["id" => $book->getAuthorId()]);

            if (!$category || !$author) return;

            $item = [
                "book" => $book,
                "category" => $category,
                "author" => $author,
            ];

            $items[] = $item;
        }

        View::render("$this->resource/index", ["items" => $items, "authors" => $authors, "categories" => $categories]);
    }

    public function show(): void
    {
        $id = $_REQUEST["id"];
        $book = Book::find(["id" => $id]);

        if (!$book) {
            View::render("404");
            return;
        }

        $category = Category::find(["id" => $book->getCategoryId()]);
        $author = Author::find(["id" => $book->getAuthorId()]);

        if (!$category || !$author) return;

        View::render("$this->resource/show", ["book" => $book, "category" => $category, "author" => $author]);
    }

    public function new(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];

        if ($method === "POST") {
            $this->putBook();

            $this->redirect();
        }

        $authors = Author::all();
        $categories = Category::all();

        View::render("$this->resource/new", ["authors" => $authors, "categories" => $categories]);
    }

    public function edit(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $id = $_REQUEST["id"];
        $book = Book::find(["id" => $id]);

        if ($method === "POST") {
            $this->putBook($book);

            $this->redirect();
        }

        $authors = Author::all();
        $categories = Category::all();

        View::render("$this->resource/edit", ["state" => $book, "authors" => $authors, "categories" => $categories]);
    }

    public function delete(): void
    {
        $id = $_REQUEST["id"];
        $book = Book::find(["id" => $id]);

        if (!$book) return;

        $book->delete();

        $this->redirect();
    }

    private function putBook(?Book $book = null): void
    {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $authorId = $_POST["author_id"];
        $categoryId = $_POST["category_id"];
        $publishedAt = $_POST["published_at"];

        $category = Category::find(["id" => $categoryId]);
        if (!$category) return;

        $author = Author::find(["id" => $authorId]);
        if (!$author) return;

        $book = $book ?? new Book();
        $book->setTitle($title);
        $book->setDescription($description);
        $book->setCategoryId($categoryId);
        $book->setAuthorId($authorId);
        $book->setPublishedAt($publishedAt);

        $book->save();
    }

    private function redirect(): void
    {
        $this->redirectTo("/$this->resource");
    }
}
