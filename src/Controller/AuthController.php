<?php

namespace App\Controller;

use App\Controller;
use App\View;

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
