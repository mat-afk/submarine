<?php

namespace App\Middleware;

use App\Middleware;

class AuthMiddleware implements Middleware
{

    public function handle(callable $next): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION["user_id"])) {
            header("Location: /login");
            exit();
        }

        $next();
    }
}