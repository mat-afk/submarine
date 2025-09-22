<?php

abstract class Model
{
    protected static string $table;
    protected ?int $id = null;

    public function __construct(
        private PDO $pdo
    ) {}

    public function save(): bool
    {
        $attributes = get_object_vars($this);

        unset($attributes["pdo"]);

        $columns = [];
        $values = [];

        foreach ($attributes as $key => $value) {
            if ($key === "id") continue;

            $columns[] = $key;
            $values[":" . $key] = $value;
        }

        $joined_columns = implode(", ", $columns);
        $joined_values = implode(", ", array_keys($values));

        if ($this->id === null) {
            $sql = "INSERT INTO {$this->table} ($joined_columns) VALUES ($joined_values)";

            $stmt = $this->pdo->prepare($sql);
            $ok = $stmt->execute($values);

            if ($ok) {
                $this->id = (int) $this->pdo->lastInsertId();
            }

            return $ok;
        }

        $set = implode(", ", array_map(fn($column) => "$column = :$column", $columns));
        $values[":id"] = $this->id;

        $sql = "UPDATE {$this->table} SET $set WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($values);
    }

    public static function find(PDO $pdo, int $id): ?static
    {
        $table = static::$table;
        $sql = "SELECT * FROM $table WHERE id = :id LIMIT 1";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([":id" => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) return null;

        return static::map($row, $pdo);
    }

    public static function all(PDO $pdo): array
    {
        $table = static::$table;
        $sql = "SELECT * FROM $table";

        $stmt = $pdo->query($sql);
        $results = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $results[] = static::map($row, $pdo);
        }

        return $results;
    }

    public function delete(): bool
    {
        if ($this->id === null) return false;

        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");

        return $stmt->execute([":id" => $this->id]);
    }

    private static function map($row, $pdo): static
    {
        $model = new static($pdo);
        foreach ($row as $key => $value) {
            $model->$key = $value;
        }

        return $model;
    }
}
