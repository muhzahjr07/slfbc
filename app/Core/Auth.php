<?php

declare(strict_types=1);

namespace App\Core;

use PDO;

/**
 * Authentication and Authorization Service
 */
class Auth
{
    private const AUTH_KEY = 'admin_user';

    public static function user(): ?array
    {
        Session::start();
        return Session::get(self::AUTH_KEY);
    }

    public static function check(): bool
    {
        return self::user() !== null;
    }

    public static function id(): ?int
    {
        $user = self::user();
        return isset($user['id']) ? (int)$user['id'] : null;
    }

    public static function isRateLimited(string $ip): bool
    {
        $pdo = Database::getConnection();
        $limit = $GLOBALS['config']['security']['rate_limit_attempts'] ?? 5;
        $minutes = $GLOBALS['config']['security']['rate_limit_minutes'] ?? 15;

        // Check driver for date arithmetic
        $driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
        if ($driver === 'sqlite') {
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM login_attempts WHERE ip_address = ? AND attempted_at >= datetime('now', '-' || ? || ' minutes')");
            $stmt->execute([$ip, $minutes]);
        } else {
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM login_attempts WHERE ip_address = ? AND attempted_at >= DATE_SUB(NOW(), INTERVAL ? MINUTE)");
            $stmt->execute([$ip, $minutes]);
        }

        $attempts = (int)$stmt->fetchColumn();
        return $attempts >= $limit;
    }

    public static function recordAttempt(string $ip): void
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO login_attempts (ip_address, attempted_at) VALUES (?, datetime('now'))");
        if ($pdo->getAttribute(PDO::ATTR_DRIVER_NAME) !== 'sqlite') {
            $stmt = $pdo->prepare("INSERT INTO login_attempts (ip_address, attempted_at) VALUES (?, NOW())");
        }
        $stmt->execute([$ip]);
    }

    public static function clearAttempts(string $ip): void
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM login_attempts WHERE ip_address = ?");
        $stmt->execute([$ip]);
    }

    public static function attempt(string $email, string $password, string $ip): bool
    {
        if (self::isRateLimited($ip)) {
            return false;
        }

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE email = ? AND is_active = 1 LIMIT 1");
        $stmt->execute([$email]);
        $admin = $stmt->fetch();

        if (!$admin || !password_verify($password, $admin['password_hash'])) {
            self::recordAttempt($ip);
            return false;
        }

        // Login successful: clear attempts and regenerate session
        self::clearAttempts($ip);
        Session::regenerate();

        // Update last login
        $driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
        $timeSql = $driver === 'sqlite' ? "datetime('now')" : "NOW()";
        $updateStmt = $pdo->prepare("UPDATE admins SET last_login_at = {$timeSql} WHERE id = ?");
        $updateStmt->execute([$admin['id']]);

        // Store non-sensitive user data in session
        Session::set(self::AUTH_KEY, [
            'id' => (int)$admin['id'],
            'name' => $admin['name'],
            'email' => $admin['email'],
            'role' => $admin['role'],
        ]);

        return true;
    }

    public static function logout(): void
    {
        Session::remove(self::AUTH_KEY);
        Session::destroy();
    }
}
