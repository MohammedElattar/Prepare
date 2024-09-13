<?php

use App\Jobs\TruncateTelescopeJob;
use Illuminate\Support\Facades\Schedule;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

//Schedule::command('backup:clean --disable-notifications')->daily()->at('1:00');
//Schedule::command('backup:run --only-db --disable-notifications')->daily()->at('2:00');

Schedule::job(new TruncateTelescopeJob())->everyTenMinutes();
