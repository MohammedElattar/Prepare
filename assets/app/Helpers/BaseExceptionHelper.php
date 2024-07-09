<?php

namespace App\Helpers;

use App\Traits\HttpResponse;
use Exception;
use Illuminate\Foundation\Configuration\Exceptions;

abstract class BaseExceptionHelper
{
    abstract public static function handle(Exceptions $exceptions);

    protected static function generalErrorResponse(Exception $exception, $data = null, ?int $code = null, $message = null)
    {
        $class = new class
        {
            use HttpResponse;
        };

        return $class->errorResponse(
            $data,
            $code ?: $exception->getCode(),
            $message ?: $exception->getMessage()
        );
    }
}
