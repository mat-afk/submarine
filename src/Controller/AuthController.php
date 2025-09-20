<?php

require __DIR__ . "/../View.php";

class AuthController
{
    public function __construct(private PDO $pdo) {}

    public function index(): void
    {
        View::render("index");
    }

    public function login(): void
    {
        View::render("login");
    }

    public function register(): void
    {
        View::render("register");
    }
}
