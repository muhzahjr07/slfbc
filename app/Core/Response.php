<?php

declare(strict_types=1);

namespace App\Core;

/**
 * HTTP Response Handler
 */
class Response
{
    private int $statusCode = 200;
    private array $headers = [];
    private string $content = '';

    public function setStatusCode(int $code): self
    {
        $this->statusCode = $code;
        return $this;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function html(string $html, int $statusCode = 200): void
    {
        $this->statusCode = $statusCode;
        $this->content = $html;
        $this->applyHeaders();
        echo $html;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function header(string $name, string $value): self
    {
        $this->headers[$name] = $value;
        return $this;
    }

    public function redirect(string $url, int $statusCode = 302): void
    {
        $this->statusCode = $statusCode;
        $this->headers['Location'] = $url;
        if (!headers_sent() && php_sapi_name() !== 'cli') {
            http_response_code($statusCode);
            header("Location: {$url}");
            exit;
        }
    }

    public function json(mixed $data, int $statusCode = 200): void
    {
        $this->statusCode = $statusCode;
        if (!headers_sent() && php_sapi_name() !== 'cli') {
            http_response_code($statusCode);
            header('Content-Type: application/json; charset=utf-8');
            foreach ($this->headers as $name => $value) {
                header("{$name}: {$value}");
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        if (php_sapi_name() !== 'cli') {
            exit;
        }
    }

    public function applyHeaders(): void
    {
        if (!headers_sent() && php_sapi_name() !== 'cli') {
            http_response_code($this->statusCode);
            foreach ($this->headers as $name => $value) {
                header("{$name}: {$value}");
            }
        }
    }
}
