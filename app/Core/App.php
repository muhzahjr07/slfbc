<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Application Bootstrap and Lifecycle Manager
 */
class App
{
    private Router $router;
    private array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
        $GLOBALS['config'] = $config;

        $this->setupAutoloader();
        $this->setupErrorHandling();
        $this->setupSecurityHeaders();

        // Require Global Template Helpers
        require_once $config['app']['root_dir'] . '/app/Helpers/helpers.php';

        // Initialize Services
        Database::init(require $config['app']['root_dir'] . '/config/database.php');
        Session::start();
        View::init($config['app']['root_dir'] . '/app/Views');

        $this->router = new Router();
        $this->loadRoutes();
    }

    private function loadRoutes(): void
    {
        $routesPath = $this->config['app']['root_dir'] . '/routes';
        if (file_exists($routesPath . '/web.php')) {
            $router = $this->router;
            require $routesPath . '/web.php';
        }
    }

    private function setupAutoloader(): void
    {
        spl_autoload_register(function (string $class): void {
            $prefix = 'App\\';
            $baseDir = dirname(__DIR__) . '/';

            $len = strlen($prefix);
            if (strncmp($prefix, $class, $len) !== 0) {
                return;
            }

            $relativeClass = substr($class, $len);
            $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

            if (file_exists($file)) {
                require $file;
            }
        });
    }

    private function setupErrorHandling(): void
    {
        $debug = (bool)($this->config['app']['debug'] ?? false);

        if ($debug) {
            ini_set('display_errors', '1');
            ini_set('display_startup_errors', '1');
            error_reporting(E_ALL);
        } else {
            ini_set('display_errors', '0');
            error_reporting(E_ALL);
            ini_set('log_errors', '1');
            ini_set('error_log', $this->config['app']['root_dir'] . '/storage/logs/error.log');
        }
    }

    private function setupSecurityHeaders(): void
    {
        if (headers_sent()) {
            return;
        }

        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }

    public function getRouter(): Router
    {
        return $this->router;
    }

    public function run(): void
    {
        $request = new Request();
        $response = new Response();

        try {
            $this->router->dispatch($request, $response);
        } catch (\Throwable $e) {
            $this->handleException($e, $response);
        }
    }

    private function handleException(\Throwable $e, Response $response): void
    {
        error_log((string)$e);

        $debug = (bool)($this->config['app']['debug'] ?? false);

        $response->setStatusCode(500);
        $response->applyHeaders();

        if ($debug) {
            echo '<h1>500 Internal Server Error</h1>';
            echo '<p><strong>Message:</strong> ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
            echo '<p><strong>File:</strong> ' . htmlspecialchars($e->getFile(), ENT_QUOTES, 'UTF-8') . ':' . $e->getLine() . '</p>';
            echo '<pre>' . htmlspecialchars($e->getTraceAsString(), ENT_QUOTES, 'UTF-8') . '</pre>';
        } else {
            echo View::render('errors.500', [
                'pageTitle' => 'Server Error | SLFBC',
            ]);
        }
    }
}
