<?php

declare(strict_types=1);

namespace App\Core;

/**
 * View Rendering Engine with Reusable Layouts and View Helpers
 */
class View
{
    private static string $viewsPath;

    public static function init(string $path): void
    {
        self::$viewsPath = rtrim($path, '/');
    }

    public static function render(string $view, array $data = [], ?string $layout = 'main'): string
    {
        if (empty(self::$viewsPath)) {
            self::$viewsPath = dirname(__DIR__) . '/Views';
        }

        $viewFile = self::$viewsPath . '/' . str_replace('.', '/', $view) . '.php';

        if (!file_exists($viewFile)) {
            throw new \RuntimeException("View file not found: {$viewFile}");
        }

        // Extract variables to local scope
        extract($data, EXTR_SKIP);

        // Render view contents
        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        // If no layout is requested, return raw view content
        if ($layout === null) {
            return $content;
        }

        $layoutFile = self::$viewsPath . '/layouts/' . $layout . '.php';
        if (!file_exists($layoutFile)) {
            return $content;
        }

        // Render inside layout
        ob_start();
        require $layoutFile;
        return ob_get_clean();
    }

    public static function e(mixed $value): string
    {
        return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
    }

    public static function url(string $path = ''): string
    {
        $baseUrl = rtrim($GLOBALS['config']['app']['url'] ?? '', '/');
        $cleanPath = '/' . ltrim($path, '/');
        return $cleanPath === '/' ? ($baseUrl ?: '') . '/' : ($baseUrl ?: '') . $cleanPath;
    }

    public static function asset(string $path): string
    {
        $baseUrl = rtrim($GLOBALS['config']['app']['url'] ?? '', '/');
        return ($baseUrl ?: '') . '/' . ltrim($path, '/');
    }
}

// Global View Helper Functions for Templates

if (!function_exists('e')) {
    function e(mixed $value): string {
        return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('url')) {
    function url(string $path = ''): string {
        $baseUrl = rtrim($GLOBALS['config']['app']['url'] ?? '', '/');
        $cleanPath = '/' . ltrim($path, '/');
        return $cleanPath === '/' ? $baseUrl . '/' : $baseUrl . $cleanPath;
    }
}

if (!function_exists('asset')) {
    function asset(string $path): string {
        $baseUrl = rtrim($GLOBALS['config']['app']['url'] ?? '', '/');
        return $baseUrl . '/' . ltrim($path, '/');
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
        $current = $GLOBALS['current_request_path'] ?? '/';
        if ($pattern === '/') {
            return $current === '/';
        }
        return str_starts_with($current, '/' . ltrim($pattern, '/'));
    }
}
