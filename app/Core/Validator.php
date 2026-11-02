<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Server-Side Form and File Validator
 */
class Validator
{
    private array $data;
    private array $rules;
    private array $errors = [];

    public function __construct(array $data, array $rules = [])
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    public function validate(?array $rules = null): bool
    {
        $rulesToRun = $rules ?? $this->rules;
        foreach ($rulesToRun as $field => $fieldRules) {
            foreach ((array)$fieldRules as $rule) {
                if ($rule === 'required') {
                    $this->required($field);
                } elseif ($rule === 'email') {
                    $this->email($field);
                } elseif (is_array($rule) && ($rule[0] ?? '') === 'max') {
                    $this->maxLength($field, (int)($rule[1] ?? 255));
                } elseif (is_array($rule) && ($rule[0] ?? '') === 'min') {
                    $this->minLength($field, (int)($rule[1] ?? 1));
                }
            }
        }
        return $this->passes();
    }

    public static function make(array $data): self
    {
        return new self($data);
    }

    public function required(string $field, ?string $message = null): self
    {
        $val = $this->data[$field] ?? null;
        if ($val === null || (is_string($val) && trim($val) === '') || (is_array($val) && empty($val))) {
            $this->addError($field, $message ?? ucfirst(str_replace('_', ' ', $field)) . ' is required.');
        }
        return $this;
    }

    public function email(string $field, ?string $message = null): self
    {
        $val = $this->data[$field] ?? null;
        if ($val !== null && trim((string)$val) !== '') {
            if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError($field, $message ?? 'Please provide a valid email address.');
            }
        }
        return $this;
    }

    public function minLength(string $field, int $min, ?string $message = null): self
    {
        $val = (string)($this->data[$field] ?? '');
        if (mb_strlen(trim($val)) < $min) {
            $this->addError($field, $message ?? ucfirst(str_replace('_', ' ', $field)) . " must be at least {$min} characters.");
        }
        return $this;
    }

    public function maxLength(string $field, int $max, ?string $message = null): self
    {
        $val = (string)($this->data[$field] ?? '');
        if (mb_strlen(trim($val)) > $max) {
            $this->addError($field, $message ?? ucfirst(str_replace('_', ' ', $field)) . " may not exceed {$max} characters.");
        }
        return $this;
    }

    public function honeypot(string $field = 'website_hp', ?string $message = null): self
    {
        $val = $this->data[$field] ?? '';
        if (!empty($val)) {
            $this->addError($field, $message ?? 'Spam bot submission detected.');
        }
        return $this;
    }

    /**
     * Validate uploaded file array
     *
     * @param array $file $_FILES['key'] array
     * @param array $allowedExtensions allowed lowercase extensions
     * @param int $maxSizeBytes maximum size in bytes
     * @param array $allowedMimes allowed MIME types
     * @return string|null Error message or null if valid
     */
    public static function validateFile(
        array $file,
        array $allowedExtensions = [],
        int $maxSizeBytes = 10485760,
        array $allowedMimes = []
    ): ?string {
        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
            return 'File upload error (Code: ' . ($file['error'] ?? 'unknown') . ').';
        }

        if (isset($file['size']) && $file['size'] > $maxSizeBytes) {
            $maxMb = round($maxSizeBytes / (1024 * 1024), 1);
            return "File size exceeds maximum allowed limit of {$maxMb}MB.";
        }

        $fileName = $file['name'] ?? '';
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $prohibited = ['php', 'phtml', 'php3', 'php4', 'php5', 'php7', 'phps', 'phar', 'exe', 'sh', 'bat', 'cmd', 'js', 'html', 'htm'];
        
        if (in_array($ext, $prohibited, true)) {
            return 'Executable file extension prohibited.';
        }

        if (!empty($allowedExtensions) && !in_array($ext, $allowedExtensions, true)) {
            return 'Invalid file extension. Allowed extensions: ' . implode(', ', $allowedExtensions);
        }

        // Real MIME check if file exists on disk
        $tmpPath = $file['tmp_name'] ?? '';
        if (!empty($tmpPath) && file_exists($tmpPath) && function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $detectedMime = finfo_file($finfo, $tmpPath);
            finfo_close($finfo);

            if (!empty($allowedMimes) && !in_array($detectedMime, $allowedMimes, true)) {
                return 'Invalid file type detected (' . $detectedMime . ').';
            }
        } elseif (!empty($allowedMimes) && isset($file['type']) && !empty($file['type'])) {
            if (!in_array($file['type'], $allowedMimes, true)) {
                return 'Invalid file type (' . $file['type'] . ').';
            }
        }

        return null;
    }

    public function addError(string $field, string $message): void
    {
        if (!isset($this->errors[$field])) {
            $this->errors[$field] = $message;
        }
    }

    public function passes(): bool
    {
        return empty($this->errors);
    }

    public function fails(): bool
    {
        return !empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function firstError(): ?string
    {
        return reset($this->errors) ?: null;
    }
}
