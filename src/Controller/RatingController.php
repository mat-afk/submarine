<?php

namespace App\Controller;

use App\Model\Book;
use App\Model\Rating;
use App\Model\User;
use App\View;

class RatingController extends CrudController
{
    private string $resource = "ratings";

    public function index(): void
    {
        $ratings = Rating::all();

        $items = [];
        foreach ($ratings as $rating) {
            $book = Book::find(["id" => $rating->getBookId()]);
            $user = User::find(["id" => $rating->getUserId()]);

            if (!$book | !$user) return;

            $item = [
                "rating" => $rating,
                "book" => $book,
                "user" => $user
            ];

            $items[] = $item;
        }

        View::render("$this->resource/index", ["items" => $items]);
    }

    public function show(): void
    {
        $this->redirect();
    }

    public function new(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];
        if ($method === "POST") {
            $this->putRating();

            $this->redirect();
        }

        $books = Book::all();

        View::render("$this->resource/new", ["books" => $books]);
    }

    public function edit(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $id = $_REQUEST["id"];
        $rating = Rating::find(["id" => $id]);

        if ($method === "POST") {
            $this->putRating($rating);

            $this->redirect();
        }

        $books = Book::all();

        View::render("$this->resource/edit", ["state" => $rating, "books" => $books]);
    }

    public function delete(): void
    {
        $id = $_REQUEST["id"];
        $rating = Rating::find(["id" => $id]);

        if (!$rating) return;

        $rating->delete();

        $this->redirect();
    }

    private function putRating(?Rating $rating = null): void
    {
        $bookId = $_POST["book_id"];
        $stars = $_POST["stars"];
        $comment = $_POST["comment"];

        $userId = $_SESSION["user_id"];

        $book = Book::find(["id" => $bookId]);
        $user = User::find(["id" => $userId]);

        if (!$book || !$user) return;

        $rating = $rating ?? new Rating();

        $rating->setUserId($userId);
        $rating->setBookId($bookId);
        $rating->setStars($stars);
        $rating->setComment($comment);

        $rating->save();
    }

    private function redirect(): void
    {
        $this->redirectTo("/$this->resource");
    }
}
