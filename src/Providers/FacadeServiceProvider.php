<?php

namespace Elattar\Prepare\Providers;

use Elattar\Prepare\Helpers\Composer;
use Illuminate\Support\ServiceProvider;

class FacadeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(Composer::class, function () {
            return new Composer();
        });
    }

    public function boot()
    {

    }
}
