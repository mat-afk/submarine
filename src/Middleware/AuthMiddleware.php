<?php

namespace App\Middleware;

use App\Middleware;
use App\Model\User;

class AuthMiddleware implements Middleware
{

    public function handle(callable $next): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION["user_id"])) {
            $this->redirectToLogin();
        }

        $id = $_SESSION["user_id"];

        $user = User::find(["id" => $id]);

        if (!$user) {
            $this->redirectToLogin();
        }

        $next();
    }

    private function redirectToLogin()
    {
        header("Location: /login");
        exit();
    }
}
