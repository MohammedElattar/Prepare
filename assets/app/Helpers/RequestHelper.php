<?php

namespace App\Helpers;

use App\Helpers\GeneralHelper;
use Illuminate\Http\Request;
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

    public static function authMiddlewares(array $additionalMiddlewares = []): array
    {
        return array_merge(GeneralHelper::getDefaultLoggedUserMiddlewares(), $additionalMiddlewares);
    }

    public static function formatPhoneNumber(Request $request, string $key = 'phone')
    {
        if ($request->has($key)) {
            $phoneValue = '+'.Str::of($request->{$key})->trim('+');

            $request->replace([
                ...$request->all(),
                $key => $phoneValue === '+' ? null : $phoneValue,
            ]);
        }
    }
}
