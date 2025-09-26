<?php

namespace App\Model;

use App\Model;
use PDO;

class User extends Model
{
    protected static string $table = "users";

    protected string $name;
    protected string $email;
    protected string $password;

    public static function findByEmail(PDO $pdo, string $email): ?User
    {
        $table = static::$table;
        $sql = "SELECT * FROM $table WHERE email = :email";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([":email" => $email]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) return null;

        return static::map($row, $pdo);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function passwordMatches(string $password): bool
    {
        return password_verify($password, $this->password);
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }
}
