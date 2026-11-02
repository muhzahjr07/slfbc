<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class BusinessOpportunity
{
    public static function allFeatured(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM business_opportunities WHERE is_featured = 1 ORDER BY display_order ASC");
        return $stmt->fetchAll();
    }

    public static function all(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM business_opportunities ORDER BY display_order ASC");
        return $stmt->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM business_opportunities WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public static function findBySlug(string $slug): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM business_opportunities WHERE slug = ? LIMIT 1");
        $stmt->execute([$slug]);
        return $stmt->fetch() ?: null;
    }

    public static function create(array $data): int
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO business_opportunities (title, slug, track, icon, corridor, summary, details, status_label, is_featured, display_order)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $data['title'],
            $data['slug'],
            $data['track'],
            $data['icon'] ?? 'account_balance',
            $data['corridor'] ?? 'bilateral',
            $data['summary'],
            $data['details'] ?? null,
            $data['status_label'] ?? 'Active Project Pipeline',
            !empty($data['is_featured']) ? 1 : 0,
            (int)($data['display_order'] ?? 0),
        ]);
        return (int)$pdo->lastInsertId();
    }

    public static function update(int $id, array $data): bool
    {
        $pdo = Database::getConnection();
        $sql = "UPDATE business_opportunities SET 
                title = ?, slug = ?, track = ?, icon = ?, corridor = ?,
                summary = ?, details = ?, status_label = ?, is_featured = ?, display_order = ?
                WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            $data['title'],
            $data['slug'],
            $data['track'],
            $data['icon'] ?? 'account_balance',
            $data['corridor'] ?? 'bilateral',
            $data['summary'],
            $data['details'] ?? null,
            $data['status_label'] ?? 'Active Project Pipeline',
            !empty($data['is_featured']) ? 1 : 0,
            (int)($data['display_order'] ?? 0),
            $id,
        ]);
    }

    public static function delete(int $id): bool
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM business_opportunities WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
