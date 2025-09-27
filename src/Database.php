<?php

namespace App;

use PDO;

class Database
{
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (static::$connection) {
            return static::$connection;
        }

        $host = getenv("DB_HOST") ?: "db";
        $db = getenv("DB_NAME") ?: "submarine";
        $user = getenv("DB_USER") ?: "mysql";
        $password = getenv("DB_PASSWORD") ?: "mysql";

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false
        ];

        static::$connection = new PDO($dsn, $user, $password, $options);

        return static::$connection;
    }
}
