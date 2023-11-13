<?php

namespace Elattar\Prepare\Providers;

use Elattar\Prepare\Http\Middleware\AlwaysAcceptJson;
use Elattar\Prepare\Http\Middleware\SetDefaultLocale;
use Illuminate\Foundation\Http\Kernel;
use Illuminate\Support\ServiceProvider;

class MiddlewareServiceProvider extends ServiceProvider
{
    public function boot(Kernel $kernel): void
    {
        $kernel
            ->pushMiddleware(AlwaysAcceptJson::class)
            ->pushMiddleware(SetDefaultLocale::class);
    }

    public function register()
    {

    }
}
