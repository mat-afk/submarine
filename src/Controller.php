<?php

abstract class Controller
{
    public function __construct(protected PDO $pdo) {}
}