<?php

declare(strict_types=1);

namespace App\Core;

/**
 * CSRF Protection Utility
 */
class CSRF
{
    private const TOKEN_KEY = '_csrf_token';

    public static function getToken(): string
    {
        Session::start();
        $token = Session::get(self::TOKEN_KEY);
        if (!$token || !is_string($token)) {
            $token = bin2hex(random_bytes(32));
            Session::set(self::TOKEN_KEY, $token);
        }
        return $token;
    }

    public static function validate(?string $submittedToken): bool
    {
        Session::start();
        $stored = Session::get(self::TOKEN_KEY);
        if (!is_string($stored) || !is_string($submittedToken) || empty($submittedToken)) {
            return false;
        }

        return hash_equals($stored, $submittedToken);
    }

    public static function validateToken(?string $submittedToken): bool
    {
        return self::validate($submittedToken);
    }

    public static function field(): string
    {
        $token = self::getToken();
        return '<input type="hidden" name="_csrf_token" value="' . htmlspecialchars($token, ENT_QUOTES, 'UTF-8') . '">';
    }
}
