<?php

namespace Elattar\Prepare\Providers;

use Illuminate\Support\ServiceProvider;

class PrepareServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(MiddlewareServiceProvider::class);
        $this->app->register(FacadeServiceProvider::class);
        $this->app->register(ScheduleServiceProvider::class);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../Http/Middleware/RedirectIfAuthenticated.php' => base_path('app/Http/Middleware/RedirectIfAuthenticated.php'),
            __DIR__.'/../Helpers/translator.php' => base_path('app/Helpers/translator.php'),
            __DIR__.'/../../config/cors.php' => config_path('cors.php'),
            __DIR__.'/../../config/ide-helper.php' => config_path('ide-helper.php'),
            __DIR__.'/../../config/modules.php' => config_path('nwidart-stubs.php'),
            __DIR__.'/../../config/permission.php' => config_path('permission.php'),
            __DIR__.'/../../stubs' => base_path('stubs'),
            __DIR__.'/../../lang' => base_path('lang'),
        ],
            'elattar-prepare'
        );
    }
}
