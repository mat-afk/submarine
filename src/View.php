<?php

namespace App;

class View
{
    public static function render(string $view, array $data = []): void
    {
        extract($data);

        require __DIR__ . "/View/Template/{$view}.php";
    }
}
