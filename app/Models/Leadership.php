<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Leadership
{
    public static function allActive(?string $termYear = null): array
    {
        $pdo = Database::getConnection();
        $sql = "SELECT * FROM leadership WHERE is_active = 1";
        $params = [];

        if ($termYear !== null) {
            $sql .= " AND term_year = ?";
            $params[] = $termYear;
        }

        $sql .= " ORDER BY display_order ASC, name ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public static function getPresident(?string $termYear = null): ?array
    {
        $pdo = Database::getConnection();
        $sql = "SELECT * FROM leadership WHERE category = 'president' AND is_active = 1";
        $params = [];

        if ($termYear !== null) {
            $sql .= " AND term_year = ?";
            $params[] = $termYear;
        }

        $sql .= " ORDER BY display_order ASC LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch() ?: null;
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM leadership WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public static function allAdmin(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM leadership ORDER BY term_year DESC, display_order ASC");
        return $stmt->fetchAll();
    }

    public static function create(array $data): int
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO leadership (term_year, category, role_title, name, organization, bio, portrait_path, display_order, is_active)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $data['term_year'] ?? '2025/26',
            $data['category'],
            $data['role_title'],
            $data['name'],
            $data['organization'],
            $data['bio'] ?? null,
            $data['portrait_path'] ?? null,
            (int)($data['display_order'] ?? 0),
            !empty($data['is_active']) ? 1 : 0,
        ]);
        return (int)$pdo->lastInsertId();
    }

    public static function update(int $id, array $data): bool
    {
        $pdo = Database::getConnection();
        $sql = "UPDATE leadership SET 
                term_year = ?, category = ?, role_title = ?, name = ?, organization = ?,
                bio = ?, portrait_path = ?, display_order = ?, is_active = ?
                WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            $data['term_year'] ?? '2025/26',
            $data['category'],
            $data['role_title'],
            $data['name'],
            $data['organization'],
            $data['bio'] ?? null,
            $data['portrait_path'] ?? null,
            (int)($data['display_order'] ?? 0),
            !empty($data['is_active']) ? 1 : 0,
            $id,
        ]);
    }

    public static function delete(int $id): bool
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM leadership WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
