<?php

namespace Elattar\Prepare\Providers;

use Elattar\Prepare\Console\Commands\PrepareCommand;
use Elattar\Prepare\Console\Commands\PublishPrepareCommand;
use Illuminate\Support\ServiceProvider;

class ScheduleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PrepareCommand::class,
                PublishPrepareCommand::class,
            ]);
        }
    }
}
