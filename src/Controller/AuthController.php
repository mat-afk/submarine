<?php

namespace App\Controller;

use App\Controller;
use App\Model\User;
use App\View;

class AuthController extends Controller
{

    public function index(): void
    {
        $location = "/books";

        if (!isset($_SESSION["user"])) {
            $location = "/login";
        }

        $this->redirectTo($location);
    }

    public function login(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];

        if ($method === "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $errors = [];

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors["INVALID_EMAIL"] = true;
            }

            if (empty($password)) {
                $errors["PASSWORD_REQUIRED"] = true;
            }

            if (count($errors) !== 0) {
                View::render("login", ["errors" => $errors]);
                return;
            }

            $user = User::find(["email" => $email]);

            if (!$user || !$user->passwordMatches($password)) {
                View::render("login", ["errors" => [
                    "BAD_CREDENTIALS" => true
                ]]);
                return;
            }

            $_SESSION["user_id"] = $user->getId();

            $this->redirectTo("/books");
        }

        View::render("login");
    }

    public function register(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];

        if ($method === "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $errors = [];

            if (empty($name)) {
                $errors["NAME_REQUIRED"] = true;
            }

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors["INVALID_EMAIL"] = true;
            }

            if (empty($password) || strlen($password) < 6) {
                $errors["WEAK_PASSWORD"] = true;
            }

            $user = User::find(["email" => $email]);

            if ($user) {
                $errors["BAD_CREDENTIALS"] = true;
            }

            if (count($errors) !== 0) {
                View::render("register",
                    [
                        "errors" => $errors,
                        "state" => [
                            "name" => $name,
                            "email" => $email,
                            "password" => $password
                        ]
                    ]
                );
                return;
            }

            $user = new User();
            $user->setName($name);
            $user->setEmail($email);
            $user->setPassword($password);

            $ok = $user->save();

            if (!$ok) {
                return;
            }

            $this->redirectTo("/books");
        }

        View::render("register");
    }
}
