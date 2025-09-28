<?php

namespace App\Model;

use App\Model;

class Category extends Model
{
    protected static string $table = "categories";

    protected string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
