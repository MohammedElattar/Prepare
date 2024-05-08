<?php

namespace Elattar\Prepare\Helpers;

use Illuminate\Support\Str;

class RequestHelper
{
    public static function loginIfHasToken($thisValue, array $additionalMiddlewares = [], array $onlyMethods = []): void
    {
        $token = request()->bearerToken();

        if ($token && ! auth()->check()) {

            if ($onlyMethods) {
                $thisValue->middleware(static::authMiddlewares())->only($onlyMethods);
            } else {
                $thisValue->middleware(static::authMiddlewares());
            }
        }
    }

    public static function authMiddlewares(array $additionalMiddlewares = [])
    {
        return array_merge(GeneralHelper::getDefaultLoggedUserMiddlewares(), $additionalMiddlewares);
    }
}
