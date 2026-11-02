<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class SiteSetting
{
    private static array $cache = [];

    public static function get(string $key, mixed $default = null): mixed
    {
        if (isset(self::$cache[$key])) {
            return self::$cache[$key];
        }

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT key_value FROM site_settings WHERE key_name = ? LIMIT 1");
        $stmt->execute([$key]);
        $val = $stmt->fetchColumn();

        if ($val === false) {
            return $default;
        }

        self::$cache[$key] = $val;
        return $val;
    }

    public static function all(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM site_settings ORDER BY key_name ASC");
        $rows = $stmt->fetchAll();
        $result = [];
        foreach ($rows as $r) {
            $result[$r['key_name']] = $r['key_value'];
        }
        return $result;
    }

    public static function set(string $key, ?string $value, ?string $description = null): bool
    {
        $pdo = Database::getConnection();
        self::$cache[$key] = $value;

        $driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
        if ($driver === 'sqlite') {
            $stmt = $pdo->prepare("INSERT INTO site_settings (key_name, key_value, description, updated_at) 
                                   VALUES (?, ?, ?, datetime('now'))
                                   ON CONFLICT(key_name) DO UPDATE SET key_value = excluded.key_value, updated_at = datetime('now')");
            return $stmt->execute([$key, $value, $description]);
        }

        $stmt = $pdo->prepare("INSERT INTO site_settings (key_name, key_value, description) 
                               VALUES (?, ?, ?)
                               ON DUPLICATE KEY UPDATE key_value = VALUES(key_value), description = COALESCE(VALUES(description), description)");
        return $stmt->execute([$key, $value, $description]);
    }
}
