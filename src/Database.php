<?php

class Database
{

    private PDO $pdo;

    public function __construct(string $host, string $db, string $user, string $password)
    {
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false
        ];

        $this->pdo = new PDO($dsn, $user, $password, $options);
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}
