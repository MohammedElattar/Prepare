<?php

namespace Elattar\Prepare\Providers;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

class ScheduleServiceProvider extends ServiceProvider
{
    public function boot()
    {
         if ($this->app->runningInConsole()) {
             $this->app->booted(function () {
                 $schedule = $this->app->make(Schedule::class);
                 $schedule->command('backup:clean --disable-notifications')->daily()->at('5:00');
                 $schedule->command('backup:run --only-db --disable-notifications')->twiceDaily();
             });
         }
    }

    public function register()
    {

    }
}
