<?php

declare(strict_types=1);

namespace Config;

use Exception;

class ValidationException extends Exception
{
    private array $errors = [];

    public function __construct(array $errors = [])
    {
        $this->errors = $errors;
        parent::__construct("Validation failed");
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function required(string $field, $value): void
    {
        if (empty($value)) {
            $this->errors[$field][] = "The $field field is required.";
        }
    }

    public function email(string $field, $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = "The $field field must be a valid email address.";
        }
    }

    public function minLength(string $field, $value, int $length): void
    {
        if (strlen($value) < $length) {
            $this->errors[$field][] = "The $field field must be at least $length characters long.";
        }
    }

    public function maxLength(string $field, $value, int $length): void
    {
        if (strlen($value) > $length) {
            $this->errors[$field][] = "The $field field must not exceed $length characters.";
        }
    }
    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }
}
