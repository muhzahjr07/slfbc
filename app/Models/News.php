<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class News
{
    public static function allPublished(?int $categoryId = null, ?string $search = null, int $page = 1, int $perPage = 6): array
    {
        $pdo = Database::getConnection();
        $offset = ($page - 1) * $perPage;

        $sql = "SELECT n.*, c.name as category_name, c.slug as category_slug 
                FROM news n 
                LEFT JOIN news_categories c ON n.category_id = c.id 
                WHERE n.status = 'published'";
        $params = [];

        if ($categoryId !== null && $categoryId > 0) {
            $sql .= " AND n.category_id = ?";
            $params[] = $categoryId;
        }

        if ($search !== null && trim($search) !== '') {
            $sql .= " AND (n.title LIKE ? OR n.excerpt LIKE ? OR n.content LIKE ?)";
            $term = '%' . trim($search) . '%';
            $params[] = $term;
            $params[] = $term;
            $params[] = $term;
        }

        $sql .= " ORDER BY n.published_at DESC LIMIT ? OFFSET ?";
        $params[] = $perPage;
        $params[] = $offset;

        $stmt = $pdo->prepare($sql);
        foreach ($params as $idx => $val) {
            $type = is_int($val) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue($idx + 1, $val, $type);
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function countPublished(?int $categoryId = null, ?string $search = null): int
    {
        $pdo = Database::getConnection();
        $sql = "SELECT COUNT(*) FROM news n WHERE n.status = 'published'";
        $params = [];

        if ($categoryId !== null && $categoryId > 0) {
            $sql .= " AND n.category_id = ?";
            $params[] = $categoryId;
        }

        if ($search !== null && trim($search) !== '') {
            $sql .= " AND (n.title LIKE ? OR n.excerpt LIKE ? OR n.content LIKE ?)";
            $term = '%' . trim($search) . '%';
            $params[] = $term;
            $params[] = $term;
            $params[] = $term;
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return (int)$stmt->fetchColumn();
    }

    public static function getLatest(int $limit = 3): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT n.*, c.name as category_name 
                               FROM news n 
                               LEFT JOIN news_categories c ON n.category_id = c.id 
                               WHERE n.status = 'published' 
                               ORDER BY n.published_at DESC LIMIT ?");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function findPublishedBySlug(string $slug): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT n.*, c.name as category_name, c.slug as category_slug 
                               FROM news n 
                               LEFT JOIN news_categories c ON n.category_id = c.id 
                               WHERE n.slug = ? AND n.status = 'published' LIMIT 1");
        $stmt->execute([$slug]);
        return $stmt->fetch() ?: null;
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT n.*, c.name as category_name 
                               FROM news n 
                               LEFT JOIN news_categories c ON n.category_id = c.id 
                               WHERE n.id = ? LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public static function allAdmin(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT n.*, c.name as category_name 
                             FROM news n 
                             LEFT JOIN news_categories c ON n.category_id = c.id 
                             ORDER BY n.created_at DESC");
        return $stmt->fetchAll();
    }

    public static function create(array $data): int
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO news (category_id, title, slug, excerpt, content, cover_image, author, published_at, status, is_featured, meta_title, meta_description)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            !empty($data['category_id']) ? (int)$data['category_id'] : null,
            $data['title'],
            $data['slug'],
            $data['excerpt'] ?? null,
            $data['content'],
            $data['cover_image'] ?? null,
            $data['author'] ?? 'SLFBC Secretariat',
            $data['published_at'] ?? date('Y-m-d H:i:s'),
            $data['status'] ?? 'draft',
            !empty($data['is_featured']) ? 1 : 0,
            $data['meta_title'] ?? null,
            $data['meta_description'] ?? null,
        ]);
        return (int)$pdo->lastInsertId();
    }

    public static function update(int $id, array $data): bool
    {
        $pdo = Database::getConnection();
        $sql = "UPDATE news SET 
                category_id = ?, title = ?, slug = ?, excerpt = ?, content = ?,
                cover_image = ?, author = ?, published_at = ?, status = ?,
                is_featured = ?, meta_title = ?, meta_description = ?
                WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            !empty($data['category_id']) ? (int)$data['category_id'] : null,
            $data['title'],
            $data['slug'],
            $data['excerpt'] ?? null,
            $data['content'],
            $data['cover_image'] ?? null,
            $data['author'] ?? 'SLFBC Secretariat',
            $data['published_at'] ?? null,
            $data['status'] ?? 'draft',
            !empty($data['is_featured']) ? 1 : 0,
            $data['meta_title'] ?? null,
            $data['meta_description'] ?? null,
            $id,
        ]);
    }

    public static function delete(int $id): bool
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM news WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function getAllCategories(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM news_categories ORDER BY name ASC");
        return $stmt->fetchAll();
    }
}
