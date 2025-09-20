<?php

require __DIR__ . "/../View.php";

class AuthController
{

    public function __construct(private PDO $pdo) {}

    public function index()
    {
        View::render("index");
    }

    public function login()
    {
        View::render("login");
    }

    public function register()
    {
        View::render("register");
    }
}
