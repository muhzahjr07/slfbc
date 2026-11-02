<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class AdminUser
{
    public static function all(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT id, name, email, role, is_active, last_login_at, created_at FROM admins ORDER BY name ASC");
        return $stmt->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT id, name, email, role, is_active, last_login_at, created_at FROM admins WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public static function create(string $name, string $email, string $password, string $role = 'super_admin'): int
    {
        $pdo = Database::getConnection();
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO admins (name, email, password_hash, role, is_active, created_at) VALUES (?, ?, ?, ?, 1, datetime('now'))";
        if ($pdo->getAttribute(PDO::ATTR_DRIVER_NAME) !== 'sqlite') {
            $sql = str_replace("datetime('now')", "NOW()", $sql);
        }
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $hash, $role]);
        return (int)$pdo->lastInsertId();
    }

    public static function updatePassword(int $id, string $password): bool
    {
        $pdo = Database::getConnection();
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("UPDATE admins SET password_hash = ? WHERE id = ?");
        return $stmt->execute([$hash, $id]);
    }
}
