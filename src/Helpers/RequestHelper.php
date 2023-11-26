<?php

namespace Elattar\Prepare\Helpers;

use Illuminate\Support\Str;

class RequestHelper
{
    /**
     * Check if the request is coming from Single Page Application ( SPA )
     */
    public static function isFirstPartyFrontend(): bool
    {
        $domain = request()->headers->get('referer') ?: request()->headers->get('origin');

        return request('fromPostman') || !is_null($domain);
    }

    /**
     * Check If The Request Came From public Website
     */
    public static function isPublicRoute(string $fullUrl = null): bool
    {
        return static::urlContainsKey('public', $fullUrl);
    }

    /**
     * Check If The Request Didn't Come From public Website
     */
    public static function isNotPublicRoute(string $fullUrl = null): bool
    {

        return !static::isPublicRoute(fullUrl: $fullUrl);
    }

    public static function urlContainsKey(string $key, string $fullUrl = null): bool
    {
        return Str::contains($fullUrl ?: request()->url(), $key);
    }
}
