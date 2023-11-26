<?php

namespace Elattar\Prepare\Providers;

use Illuminate\Support\ServiceProvider;

class PrepareServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(MiddlewareServiceProvider::class);
        $this->app->register(FacadeServiceProvider::class);
        $this->app->register(CommandServiceProvider::class);
        $this->app->register(ScheduleServiceProvider::class);
    }

    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../../assets' => base_path(),
            ],
            'elattar-prepare'
        );
    }
}
