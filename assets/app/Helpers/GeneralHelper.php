<?php

namespace App\Helpers;

class GeneralHelper
{
    public static function getDefaultLoggedUserMiddlewares(string $permissions = null): array
    {
        $permissions = $permissions ? 'permission:' . $permissions : null;

        $middlewares = [
            'auth:sanctum',
        ];

        if ($permissions) {
            $middlewares[] = $permissions;
        }

        return $middlewares;
    }

    public static function authMiddleware(): string
    {
        return 'auth:sanctum';
    }
}
