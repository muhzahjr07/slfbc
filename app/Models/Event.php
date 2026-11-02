<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Event
{
    public static function getUpcoming(int $limit = 6): array
    {
        $pdo = Database::getConnection();
        $now = date('Y-m-d H:i:s');
        $stmt = $pdo->prepare("SELECT * FROM events 
                               WHERE status = 'published' AND start_datetime >= ? 
                               ORDER BY start_datetime ASC LIMIT ?");
        $stmt->bindValue(1, $now, PDO::PARAM_STR);
        $stmt->bindValue(2, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getPast(int $limit = 12): array
    {
        $pdo = Database::getConnection();
        $now = date('Y-m-d H:i:s');
        $stmt = $pdo->prepare("SELECT * FROM events 
                               WHERE status = 'published' AND start_datetime < ? 
                               ORDER BY start_datetime DESC LIMIT ?");
        $stmt->bindValue(1, $now, PDO::PARAM_STR);
        $stmt->bindValue(2, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function findBySlug(string $slug): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM events WHERE slug = ? AND status = 'published' LIMIT 1");
        $stmt->execute([$slug]);
        return $stmt->fetch() ?: null;
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public static function allAdmin(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM events ORDER BY start_datetime DESC");
        return $stmt->fetchAll();
    }

    public static function create(array $data): int
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO events (title, slug, category, start_datetime, end_datetime, venue, location_city, summary, description, cover_image, registration_url, registration_status, status, report_summary, meta_title, meta_description)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $data['title'],
            $data['slug'],
            $data['category'] ?? 'Summit',
            $data['start_datetime'],
            $data['end_datetime'] ?? null,
            $data['venue'],
            $data['location_city'] ?? 'Colombo',
            $data['summary'] ?? null,
            $data['description'],
            $data['cover_image'] ?? null,
            $data['registration_url'] ?? null,
            $data['registration_status'] ?? 'open',
            $data['status'] ?? 'published',
            $data['report_summary'] ?? null,
            $data['meta_title'] ?? null,
            $data['meta_description'] ?? null,
        ]);
        return (int)$pdo->lastInsertId();
    }

    public static function update(int $id, array $data): bool
    {
        $pdo = Database::getConnection();
        $sql = "UPDATE events SET 
                title = ?, slug = ?, category = ?, start_datetime = ?, end_datetime = ?,
                venue = ?, location_city = ?, summary = ?, description = ?, cover_image = ?,
                registration_url = ?, registration_status = ?, status = ?, report_summary = ?,
                meta_title = ?, meta_description = ?
                WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            $data['title'],
            $data['slug'],
            $data['category'] ?? 'Summit',
            $data['start_datetime'],
            $data['end_datetime'] ?? null,
            $data['venue'],
            $data['location_city'] ?? 'Colombo',
            $data['summary'] ?? null,
            $data['description'],
            $data['cover_image'] ?? null,
            $data['registration_url'] ?? null,
            $data['registration_status'] ?? 'open',
            $data['status'] ?? 'published',
            $data['report_summary'] ?? null,
            $data['meta_title'] ?? null,
            $data['meta_description'] ?? null,
            $id,
        ]);
    }

    public static function delete(int $id): bool
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM events WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
