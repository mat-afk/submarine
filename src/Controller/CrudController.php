<?php

namespace App\Controller;

use JetBrains\PhpStorm\NoReturn;
use App\Controller;

abstract class CrudController extends Controller
{

    abstract public function index(): void;
    abstract public function show(): void;
    abstract public function new(): void;
    abstract public function edit(): void;
    abstract public function delete(): void;

    #[NoReturn]
    protected function redirectTo(string $path): void
    {
        header("Location: $path");
        exit();
    }
}