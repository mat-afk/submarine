<?php

require __DIR__ . "/../View.php";
require __DIR__ . "/../Controller.php";

class AuthController extends Controller
{

    public function index(): void
    {
        View::render("index");
    }

    public function login(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            header("Location: /", true, 302);
            exit();
        }

        View::render("login");
    }

    public function register(): void
    {
        View::render("register");
    }
}
