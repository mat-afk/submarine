<?php

namespace App;

abstract class Controller
{
    protected function redirectTo(string $path): void
    {
        header("Location: $path");
        exit();
    }
}