<?php

namespace App\Controller;

use App\Controller;
use App\View;

class AuthController extends Controller
{

    public function index(): void
    {
        $location = "/books";

        if (!isset($_SESSION["user"])) {
            $location = "/login";
        }

        header("location: $location");
        exit();
    }

    public function login(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];

        if ($method === "POST") {
            header("Location: /");
            exit();
        }

        View::render("login");
    }

    public function register(): void
    {
        View::render("register");
    }
}
