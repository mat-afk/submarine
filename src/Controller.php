<?php

namespace App;

use PDO;

abstract class Controller
{
    public function __construct(protected PDO $pdo) {}
}