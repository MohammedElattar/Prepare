<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ValidationErrorsException extends Exception
{
    protected $code = Response::HTTP_UNPROCESSABLE_ENTITY;

    protected $message = 'validation_errors';

    protected array $errors = [];

    public function __construct(array $errors, string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
