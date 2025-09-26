<?php

namespace App\Middleware;

use App\Middleware;

class AuthMiddleware implements Middleware
{

    public function handle(callable $next): void
    {
        session_start();

        if (!isset($_SESSION["user"])) {
            http_response_code(401);
            header("location: /login");
            exit();
        }

        $next();
    }
}