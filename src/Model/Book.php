<?php

namespace App\Model;

use App\Database;
use App\Model;
use PDO;

class Book extends Model
{
    protected static string $table = "books";

    protected string $title;
    protected string $description;
    protected string $published_at;
    protected int $category_id;
    protected int $author_id;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPublishedAt(): string
    {
        return $this->published_at;
    }

    public function setPublishedAt(string $published_at): void
    {
        $this->published_at = $published_at;
    }

    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }

    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    public function setAuthorId(int $author_id): void
    {
        $this->author_id = $author_id;
    }

    public static function filter(?int $author_id, ?int $category_id, int $minRating = 0, int $maxRating = 5): array
    {
        $sql = "SELECT b.* FROM books b LEFT JOIN ratings r ON r.book_id = b.id";

        $params = [];
        $clauses = [];

        if ($author_id) {
            $clauses[] = "b.author_id = :author_id";
            $params[":author_id"] = $author_id;
        }

        if ($category_id) {
            $clauses[] = "b.category_id = :category_id";
            $params[":category_id"] = $category_id;
        }

        if (!empty($clauses)) {
            $sql .= " WHERE " . implode(" AND ", $clauses);
        }

        $sql .= " GROUP BY b.id HAVING COALESCE(AVG(r.stars), 0) BETWEEN :min_rating AND :max_rating";
        $params[":min_rating"] = $minRating;
        $params[":max_rating"] = $maxRating;

        $pdo = Database::getConnection();

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        $results = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $results[] = static::map($row);
        }

        return $results;
    }
}
