<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class ContactEnquiry
{
    public static function create(array $data): int
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO contact_enquiries (name, company, email, phone, subject_category, message, ip_address, is_read, status, created_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, 0, 'new', datetime('now'))";

        if ($pdo->getAttribute(PDO::ATTR_DRIVER_NAME) !== 'sqlite') {
            $sql = str_replace("datetime('now')", "NOW()", $sql);
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $data['name'],
            $data['company'] ?? null,
            $data['email'],
            $data['phone'] ?? null,
            $data['subject_category'],
            $data['message'],
            $data['ip_address'] ?? '127.0.0.1',
        ]);
        return (int)$pdo->lastInsertId();
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM contact_enquiries WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public static function allAdmin(?string $status = null): array
    {
        $pdo = Database::getConnection();
        $sql = "SELECT * FROM contact_enquiries";
        $params = [];

        if ($status && $status !== 'all') {
            $sql .= " WHERE status = ?";
            $params[] = $status;
        }

        $sql .= " ORDER BY created_at DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public static function markAsRead(int $id): bool
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("UPDATE contact_enquiries SET is_read = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function updateStatus(int $id, string $status, ?string $internalNotes = null): bool
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("UPDATE contact_enquiries SET status = ?, internal_notes = ? WHERE id = ?");
        return $stmt->execute([$status, $internalNotes, $id]);
    }

    public static function countUnread(): int
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT COUNT(*) FROM contact_enquiries WHERE is_read = 0");
        return (int)$stmt->fetchColumn();
    }
}
