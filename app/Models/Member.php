<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class Member
{
    public static function allActive(?int $sectorId = null, ?string $search = null, int $page = 1, int $perPage = 12): array
    {
        $pdo = Database::getConnection();
        $offset = ($page - 1) * $perPage;

        $sql = "SELECT m.*, s.name as sector_name, s.slug as sector_slug 
                FROM members m 
                LEFT JOIN sectors s ON m.sector_id = s.id 
                WHERE m.is_active = 1";
        $params = [];

        if ($sectorId !== null && $sectorId > 0) {
            $sql .= " AND m.sector_id = ?";
            $params[] = $sectorId;
        }

        if ($search !== null && trim($search) !== '') {
            $sql .= " AND (m.name LIKE ? OR m.short_description LIKE ? OR m.origin LIKE ?)";
            $term = '%' . trim($search) . '%';
            $params[] = $term;
            $params[] = $term;
            $params[] = $term;
        }

        $sql .= " ORDER BY m.display_order ASC, m.name ASC LIMIT ? OFFSET ?";
        $params[] = $perPage;
        $params[] = $offset;

        $stmt = $pdo->prepare($sql);
        // Bind integer params specifically for drivers that require it
        foreach ($params as $idx => $val) {
            $type = is_int($val) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue($idx + 1, $val, $type);
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function countActive(?int $sectorId = null, ?string $search = null): int
    {
        $pdo = Database::getConnection();
        $sql = "SELECT COUNT(*) FROM members m WHERE m.is_active = 1";
        $params = [];

        if ($sectorId !== null && $sectorId > 0) {
            $sql .= " AND m.sector_id = ?";
            $params[] = $sectorId;
        }

        if ($search !== null && trim($search) !== '') {
            $sql .= " AND (m.name LIKE ? OR m.short_description LIKE ? OR m.origin LIKE ?)";
            $term = '%' . trim($search) . '%';
            $params[] = $term;
            $params[] = $term;
            $params[] = $term;
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return (int)$stmt->fetchColumn();
    }

    public static function getFeatured(int $limit = 8): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT m.*, s.name as sector_name 
                               FROM members m 
                               LEFT JOIN sectors s ON m.sector_id = s.id 
                               WHERE m.is_active = 1 AND m.is_featured = 1 
                               ORDER BY m.display_order ASC, m.name ASC LIMIT ?");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT m.*, s.name as sector_name 
                               FROM members m 
                               LEFT JOIN sectors s ON m.sector_id = s.id 
                               WHERE m.id = ? LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public static function findBySlug(string $slug): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT m.*, s.name as sector_name 
                               FROM members m 
                               LEFT JOIN sectors s ON m.sector_id = s.id 
                               WHERE m.slug = ? AND m.is_active = 1 LIMIT 1");
        $stmt->execute([$slug]);
        return $stmt->fetch() ?: null;
    }

    public static function allAdmin(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT m.*, s.name as sector_name 
                             FROM members m 
                             LEFT JOIN sectors s ON m.sector_id = s.id 
                             ORDER BY m.display_order ASC, m.name ASC");
        return $stmt->fetchAll();
    }

    public static function create(array $data): int
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO members (name, slug, sector_id, tier, origin, logo_path, short_description, full_profile, website_url, contact_email, contact_phone, is_featured, is_active, display_order)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $data['name'],
            $data['slug'],
            !empty($data['sector_id']) ? (int)$data['sector_id'] : null,
            $data['tier'] ?? 'corporate',
            $data['origin'] ?? 'Sri Lanka',
            $data['logo_path'] ?? null,
            $data['short_description'] ?? null,
            $data['full_profile'] ?? null,
            $data['website_url'] ?? null,
            $data['contact_email'] ?? null,
            $data['contact_phone'] ?? null,
            !empty($data['is_featured']) ? 1 : 0,
            !empty($data['is_active']) ? 1 : 0,
            (int)($data['display_order'] ?? 0),
        ]);
        return (int)$pdo->lastInsertId();
    }

    public static function update(int $id, array $data): bool
    {
        $pdo = Database::getConnection();
        $sql = "UPDATE members SET 
                name = ?, slug = ?, sector_id = ?, tier = ?, origin = ?, logo_path = ?,
                short_description = ?, full_profile = ?, website_url = ?, contact_email = ?, contact_phone = ?,
                is_featured = ?, is_active = ?, display_order = ?
                WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            $data['name'],
            $data['slug'],
            !empty($data['sector_id']) ? (int)$data['sector_id'] : null,
            $data['tier'] ?? 'corporate',
            $data['origin'] ?? 'Sri Lanka',
            $data['logo_path'] ?? null,
            $data['short_description'] ?? null,
            $data['full_profile'] ?? null,
            $data['website_url'] ?? null,
            $data['contact_email'] ?? null,
            $data['contact_phone'] ?? null,
            !empty($data['is_featured']) ? 1 : 0,
            !empty($data['is_active']) ? 1 : 0,
            (int)($data['display_order'] ?? 0),
            $id,
        ]);
    }

    public static function delete(int $id): bool
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM members WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function getAllSectors(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM sectors ORDER BY display_order ASC, name ASC");
        return $stmt->fetchAll();
    }

    public static function getSectors(): array
    {
        return self::getAllSectors();
    }
}
