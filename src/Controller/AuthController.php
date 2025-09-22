<?php

require_once __DIR__ . "/../View.php";
require_once __DIR__ . "/../Controller.php";

class AuthController extends Controller
{

    public function index(): void
    {
        View::render("index");
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
