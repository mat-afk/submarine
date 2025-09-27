<?php

namespace App;

use PDO;

abstract class Controller
{
    protected function redirectTo(string $path): void
    {
        header("Location: $path");
        exit();
    }
}