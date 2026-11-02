<?php

declare(strict_types=1);

namespace App\Core;

/**
 * HTTP Request Handler
 * Encapsulates input, query parameters, uploaded files, and client state
 */
class Request
{
    private array $get;
    private array $post;
    private array $server;
    private array $files;
    private array $params = [];
    private string $method;
    private string $path;

    public function __construct(
        ?array $get = null,
        ?array $post = null,
        ?array $server = null,
        ?array $files = null
    ) {
        $this->get = $get ?? $_GET;
        $this->post = $post ?? $_POST;
        $this->server = $server ?? $_SERVER;
        $this->files = $files ?? $_FILES;
        $this->method = strtoupper((string)($this->server['REQUEST_METHOD'] ?? 'GET'));
        $this->path = $this->parsePath();
    }

    private function parsePath(): string
    {
        $uri = (string)($this->server['REQUEST_URI'] ?? '/');
        $position = strpos($uri, '?');
        if ($position !== false) {
            $uri = substr($uri, 0, $position);
        }

        // Strip subfolder or script name if running in subdirectory
        $scriptName = (string)($this->server['SCRIPT_NAME'] ?? '');
        $scriptDir = str_replace('\\', '/', dirname($scriptName));
        if ($scriptDir !== '/' && str_starts_with($uri, $scriptDir)) {
            $uri = substr($uri, strlen($scriptDir));
        }

        $trimmed = '/' . trim($uri, '/');
        return $trimmed === '//' ? '/' : $trimmed;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function isPost(): bool
    {
        return $this->method === 'POST';
    }

    public function isGet(): bool
    {
        return $this->method === 'GET';
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    public function param(string $key, mixed $default = null): mixed
    {
        return $this->params[$key] ?? $default;
    }

    public function query(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) {
            return $this->get;
        }
        return $this->get[$key] ?? $default;
    }

    public function post(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) {
            return $this->post;
        }
        return $this->post[$key] ?? $default;
    }

    public function files(): array
    {
        return $this->files;
    }

    public function file(string $key): ?array
    {
        return $this->files[$key] ?? null;
    }

    public function ip(): string
    {
        return (string)(
            $this->server['HTTP_CF_CONNECTING_IP']
            ?? $this->server['HTTP_X_FORWARDED_FOR']
            ?? $this->server['REMOTE_ADDR']
            ?? '127.0.0.1'
        );
    }

    public function isAjax(): bool
    {
        return strtolower((string)($this->server['HTTP_X_REQUESTED_WITH'] ?? '')) === 'xmlhttprequest';
    }
}
