<?php

use JetBrains\PhpStorm\NoReturn;

require_once __DIR__ . "/../View.php";
require_once __DIR__ . "/../Controller.php";

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