<?php

declare(strict_types=1);

/**
 * Sri Lanka–France Business Council (SLFBC) Portal
 * Main Front Controller & Application Entry Point
 * 
 * Powered by PHP 8.2+, PDO, and clean MVC architecture.
 * Ceylon Chamber of Commerce Secretariat
 */

// Serve existing static files directly when running under PHP built-in web server
if (php_sapi_name() === 'cli-server') {
    $uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH));
    if ($uri !== '/' && file_exists(__DIR__ . $uri) && !is_dir(__DIR__ . $uri) && pathinfo($uri, PATHINFO_EXTENSION) !== 'php') {
        return false;
    }
}

// Define application start time
define('SLFBC_START', microtime(true));

// Load configuration
$config = require dirname(__DIR__) . '/config/config.php';

// Require core App bootstrapper
require_once dirname(__DIR__) . '/app/Core/App.php';

// Instantiate and execute application lifecycle
$app = new \App\Core\App($config);
$app->run();
