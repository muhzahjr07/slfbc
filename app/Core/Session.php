<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Secure Session Manager
 * Encapsulates session initialization, regeneration, and flash messaging
 */
class Session
{
    private static bool $started = false;

    public static function start(): void
    {
        if (self::$started || session_status() === PHP_SESSION_ACTIVE) {
            self::$started = true;
            return;
        }

        if (headers_sent() || php_sapi_name() === 'cli') {
            if (session_status() === PHP_SESSION_NONE) {
                @session_start();
            }
            self::$started = true;
            return;
        }

        $config = $GLOBALS['config']['session'] ?? [
            'lifetime' => 7200,
            'cookie_name' => 'slfbc_session',
            'secure' => false,
        ];

        // Secure session cookie params
        session_name($config['cookie_name']);
        session_set_cookie_params([
            'lifetime' => $config['lifetime'],
            'path' => '/',
            'domain' => '',
            'secure' => (bool)$config['secure'],
            'httponly' => true,
            'samesite' => 'Lax',
        ]);

        session_start();
        self::$started = true;
    }

    public static function set(string $key, mixed $value): void
    {
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        self::start();
        return $_SESSION[$key] ?? $default;
    }

    public static function has(string $key): bool
    {
        self::start();
        return isset($_SESSION[$key]);
    }

    public static function remove(string $key): void
    {
        self::start();
        unset($_SESSION[$key]);
    }

    public static function regenerate(): void
    {
        self::start();
        if (!headers_sent() && php_sapi_name() !== 'cli' && session_status() === PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }
    }

    public static function flash(string $key, mixed $value): void
    {
        self::start();
        $_SESSION['_flash'][$key] = $value;
    }

    public static function getFlash(string $key, mixed $default = null): mixed
    {
        self::start();
        if (isset($_SESSION['_flash'][$key])) {
            $val = $_SESSION['_flash'][$key];
            unset($_SESSION['_flash'][$key]);
            return $val;
        }
        return $default;
    }

    public static function destroy(): void
    {
        self::start();
        $_SESSION = [];
        if (!headers_sent() && php_sapi_name() !== 'cli' && ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }
        if (session_status() === PHP_SESSION_ACTIVE) {
            @session_destroy();
        }
        self::$started = false;
    }
}
