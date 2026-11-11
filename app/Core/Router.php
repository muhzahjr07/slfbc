<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Fast, Pattern-Matching Router with Legacy URL Redirection
 */
class Router
{
    private array $routes = [];
    private array $redirects = [
        '/index.php' => '/',
        '/about_layout.php' => '/about',
        '/members.php' => '/members',
        '/events.php' => '/events',
        '/application.php' => '/apply',
        '/contact.php' => '/contact',
        '/constitution.php' => '/about#constitution',
    ];

    public function get(string $path, array|callable $handler, array $middleware = []): self
    {
        $this->addRoute('GET', $path, $handler, $middleware);
        return $this;
    }

    public function post(string $path, array|callable $handler, array $middleware = []): self
    {
        $this->addRoute('POST', $path, $handler, $middleware);
        return $this;
    }

    private function addRoute(string $method, string $path, array|callable $handler, array $middleware): void
    {
        $path = '/' . trim($path, '/');
        if ($path === '//') {
            $path = '/';
        }

        // Convert {param} placeholders to regex
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[^/]+)', $path);
        $pattern = '#^' . $pattern . '$#';

        $this->routes[$method][] = [
            'path' => $path,
            'pattern' => $pattern,
            'handler' => $handler,
            'middleware' => $middleware,
        ];
    }

    public function dispatch(Request $request, Response $response): void
    {
        $method = $request->getMethod();
        $lookupMethod = ($method === 'HEAD') ? 'GET' : $method;
        $path = $request->getPath();
        $GLOBALS['current_request_path'] = $path;

        // Check for legacy redirects (301 Permanent Redirect)
        if (isset($this->redirects[$path])) {
            $response->redirect($this->redirects[$path], 301);
            return;
        }

        $routesForMethod = $this->routes[$lookupMethod] ?? [];

        foreach ($routesForMethod as $route) {
            if (preg_match($route['pattern'], $path, $matches)) {
                // Extract named parameter values
                $params = array_filter($matches, '\is_string', ARRAY_FILTER_USE_KEY);
                $request->setParams($params);

                // Run middleware pipeline
                foreach ($route['middleware'] as $mwClass) {
                    $mw = new $mwClass();
                    $result = $mw->handle($request, $response);
                    if ($result === false) {
                        return; // Middleware aborted or redirected
                    }
                }

                $handler = $route['handler'];

                if (is_callable($handler)) {
                    $content = call_user_func($handler, $request, $response, $params);
                } elseif (is_array($handler) && count($handler) === 2) {
                    [$controllerClass, $action] = $handler;
                    $controller = new $controllerClass();
                    $content = $controller->$action($request, $response, $params);
                } else {
                    throw new \RuntimeException('Invalid route handler configuration.');
                }

                if (is_string($content)) {
                    $response->applyHeaders();
                    if ($method !== 'HEAD') {
                        echo $content;
                    }
                }
                return;
            }
        }

        // 404 Handler
        $response->setStatusCode(404);
        $response->applyHeaders();
        echo View::render('errors.404', [
            'pageTitle' => 'Page Not Found | SLFBC',
            'requestedUrl' => $path,
        ]);
    }
}
