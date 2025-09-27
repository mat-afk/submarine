<?php

namespace App;

use PDO;

abstract class Model
{
    protected static string $table = "";
    protected ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function save(): bool
    {
        $attributes = get_object_vars($this);

        $columns = [];
        $values = [];

        foreach ($attributes as $key => $value) {
            if ($key === "id") continue;

            $columns[] = $key;
            $values[":" . $key] = $value;
        }

        $joined_columns = implode(", ", $columns);
        $joined_values = implode(", ", array_keys($values));
        $table = static::$table;

        $pdo = Database::getConnection();

        if ($this->id === null) {
            $sql = "INSERT INTO $table ($joined_columns) VALUES ($joined_values)";

            $ok = $pdo->prepare($sql)->execute($values);

            if ($ok) {
                $this->id = (int) $pdo->lastInsertId();
            }

            return $ok;
        }

        $set = implode(", ", array_map(fn($column) => "$column = :$column", $columns));
        $values[":id"] = $this->id;

        $sql = "UPDATE $table SET $set WHERE id = :id";

        return $pdo->prepare($sql)->execute($values);
    }

    public static function find(array $conditions = []): ?static
    {
        return static::where($conditions, 1);
    }

    public static function all(array $conditions = []): array
    {
        return static::where($conditions);
    }

    public function delete(): bool
    {
        if ($this->id === null) return false;

        $pdo = Database::getConnection();

        $table = static::$table;

        return $pdo
            ->prepare("DELETE FROM $table WHERE id = :id")
            ->execute([":id" => $this->id]);
    }

    public static function where(array $conditions = [], int $limit = -1): static|array|null
    {
        $table = static::$table;

        $sql = "SELECT * FROM $table";
        $params = [];

        if (!empty($conditions)) {
            $clauses = [];
            foreach ($conditions as $column => $value) {
                $clauses[] = "$column = :$column";
                $params[":$column"] = $value;
            }
            $sql .= " WHERE " . implode(" AND ", $clauses);
        }

        if ($limit !== -1) {
            $sql .= " LIMIT $limit";
        }

        $pdo = Database::getConnection();

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        $results = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $results[] = static::map($row);
        }

        if ($limit === 1) {
            return $results[0] ?? null;
        }

        return $results;
    }

    protected static function map($row): static
    {
        $model = new static();
        foreach ($row as $key => $value) {
            $model->$key = $value;
        }

        return $model;
    }
}
