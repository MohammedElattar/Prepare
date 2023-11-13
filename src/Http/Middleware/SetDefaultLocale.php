<?php

namespace Elattar\Prepare\Http\Middleware;

use Closure;
use Elattar\Prepare\Helpers\TranslationHelper;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetDefaultLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->header('Locale');

        if ($locale && in_array($locale, TranslationHelper::$availableLocales)) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
