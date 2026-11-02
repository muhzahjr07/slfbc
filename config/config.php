<?php

declare(strict_types=1);

/**
 * Application Configuration Loader
 * Sri Lanka–France Business Council (SLFBC) Portal
 */

// Helper to load .env file into $_ENV and putenv
if (!function_exists('loadEnv')) {
    function loadEnv(string $envPath): void {
        if (!file_exists($envPath)) {
            return;
        }

        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }

            if (str_contains($line, '=')) {
                [$name, $value] = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value);

                // Strip quotes if present
                if ((str_starts_with($value, '"') && str_ends_with($value, '"')) ||
                    (str_starts_with($value, "'") && str_ends_with($value, "'"))) {
                    $value = substr($value, 1, -1);
                }

                if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                    putenv(sprintf('%s=%s', $name, $value));
                    $_ENV[$name] = $value;
                    $_SERVER[$name] = $value;
                }
            }
        }
    }
}

// Load .env from root
$rootPath = dirname(__DIR__);
loadEnv($rootPath . '/.env');

// Helper to retrieve env values with default fallback
if (!function_exists('env')) {
    function env(string $key, mixed $default = null): mixed {
        $val = $_ENV[$key] ?? getenv($key);
        if ($val === false || $val === null) {
            return $default;
        }

        return match (strtolower((string)$val)) {
            'true', '(true)' => true,
            'false', '(false)' => false,
            'empty', '(empty)' => '',
            'null', '(null)' => null,
            default => $val,
        };
    }
}

return [
    'app' => [
        'name' => env('APP_NAME', 'Sri Lanka–France Business Council'),
        'env' => env('APP_ENV', 'production'),
        'debug' => env('APP_DEBUG', false),
        'url' => rtrim((string)env('APP_URL', 'http://localhost:8000'), '/'),
        'secret' => env('APP_SECRET', 'slfbc-secret-bilateral-key-2026'),
        'root_dir' => $rootPath,
        'public_dir' => $rootPath . '/public',
        'storage_dir' => $rootPath . '/storage',
        'upload_dir' => $rootPath . '/public/uploads',
        'secure_doc_dir' => $rootPath . '/storage/documents',
    ],
    'mail' => [
        'driver' => env('MAIL_DRIVER', 'log'),
        'host' => env('MAIL_HOST', 'localhost'),
        'port' => (int)env('MAIL_PORT', 587),
        'username' => env('MAIL_USERNAME', ''),
        'password' => env('MAIL_PASSWORD', ''),
        'encryption' => env('MAIL_ENCRYPTION', 'tls'),
        'from_address' => env('MAIL_FROM_ADDRESS', 'info@slfbc.lk'),
        'from_name' => env('MAIL_FROM_NAME', 'SLFBC Secretariat'),
        'secretariat_email' => env('SECRETARIAT_NOTIFY_EMAIL', 'slfbc@chamber.lk'),
    ],
    'session' => [
        'lifetime' => (int)env('SESSION_LIFETIME', 7200),
        'cookie_name' => env('SESSION_COOKIE_NAME', 'slfbc_session'),
        'secure' => env('SESSION_SECURE_COOKIE', false),
    ],
    'security' => [
        'rate_limit_attempts' => (int)env('ADMIN_RATE_LIMIT_ATTEMPTS', 5),
        'rate_limit_minutes' => (int)env('ADMIN_RATE_LIMIT_MINUTES', 15),
        'allowed_doc_mimes' => [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'image/jpeg',
            'image/png',
            'image/webp',
        ],
        'allowed_image_mimes' => [
            'image/jpeg',
            'image/png',
            'image/webp',
            'image/svg+xml',
        ],
        'max_file_size' => 10 * 1024 * 1024, // 10MB
    ],
    'council' => [
        'established_year' => 2004,
        'affiliated_chamber' => 'The Ceylon Chamber of Commerce',
        'address' => '50, Nawam Mawatha, Colombo 02, Sri Lanka',
        'phone_colombo' => '+94 11 558 8800',
        'phone_paris' => '+33 1 45 61 00',
        'email' => 'info@slfbc.lk',
        'secretariat_email' => 'slfbc@chamber.lk',
        'current_term' => '2025/26',
    ],
];
