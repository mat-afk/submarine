<?php

namespace App\Model;

use App\Model;

class Author extends Model
{
    protected static string $table = "authors";

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
