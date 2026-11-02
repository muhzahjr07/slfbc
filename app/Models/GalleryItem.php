<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class GalleryItem
{
    public static function all(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM gallery_items ORDER BY display_order ASC, created_at DESC");
        return $stmt->fetchAll();
    }

    public static function create(array $data): int
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO gallery_items (title, category, image_path, caption, event_date, display_order)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $data['title'],
            $data['category'] ?? 'Summits',
            $data['image_path'],
            $data['caption'] ?? null,
            $data['event_date'] ?? null,
            (int)($data['display_order'] ?? 0),
        ]);
        return (int)$pdo->lastInsertId();
    }

    public static function delete(int $id): bool
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM gallery_items WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
