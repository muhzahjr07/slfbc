<?php

declare(strict_types=1);

/**
 * Global Template Helper Functions
 * Sri Lanka–France Business Council
 */

if (!function_exists('e')) {
    function e(mixed $value): string {
        return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('url')) {
    function url(string $path = ''): string {
        $baseUrl = rtrim($GLOBALS['config']['app']['url'] ?? '', '/');
        $cleanPath = '/' . ltrim($path, '/');
        return $cleanPath === '/' ? ($baseUrl ?: '') . '/' : ($baseUrl ?: '') . $cleanPath;
    }
}

if (!function_exists('asset')) {
    function asset(string $path): string {
        $baseUrl = rtrim($GLOBALS['config']['app']['url'] ?? '', '/');
        return ($baseUrl ?: '') . '/' . ltrim($path, '/');
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token(): string {
        return \App\Core\CSRF::getToken();
    }
}

if (!function_exists('csrf_field')) {
    function csrf_field(): string {
        return \App\Core\CSRF::field();
    }
}

if (!function_exists('old')) {
    function old(string $field, mixed $default = ''): mixed {
        $flashOld = \App\Core\Session::getFlash('old', []);
        return $flashOld[$field] ?? $default;
    }
}

if (!function_exists('flash')) {
    function flash(string $key): mixed {
        return \App\Core\Session::getFlash($key);
    }
}

if (!function_exists('auth')) {
    function auth(): ?array {
        return \App\Core\Auth::user();
    }
}

if (!function_exists('isRouteActive')) {
    function isRouteActive(string $pattern): bool {
        $current = '/' . trim($GLOBALS['current_request_path'] ?? '/', '/');
        $cleanPattern = '/' . trim($pattern, '/');

        if ($cleanPattern === '/') {
            return $current === '/';
        }

        return $current === $cleanPattern || str_starts_with($current, $cleanPattern . '/');
    }
}
