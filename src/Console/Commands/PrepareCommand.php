<?php

namespace Elattar\Prepare\Console\Commands;

use Elattar\Prepare\Facades\Composer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Process;
use Laravel\Prompts\Output\ConsoleOutput;

class PrepareCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elattar:initialize';

    protected $description = 'This Command Used To Prepare Newly Created Laravel Project To Install all development tools';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //TODO install dev packages
        $this->installDependencies();

        $this->composerChanges();
    }

    private function installDependencies(): void
    {
        $this->telescope();
        $this->ideHelper();
        $this->laravelModules();
        $this->fastPaginate();
        $this->logViewer();
    }

    private function telescope(): void
    {
        $bufferedOutput = new ConsoleOutput();

        $this->info('Installing Telescope .....');

        $telescopeProcess = Process::run('composer require laravel/telescope --dev');

        $this->info($telescopeProcess->output());

        if ($telescopeProcess->successful()) {
            Artisan::call('vendor:publish', [
                '--tag' => 'telescope-assets',
                '--force' => true,
            ],
                outputBuffer: $bufferedOutput
            );

            //Artisan::call('telescope:install', outputBuffer: $bufferedOutput);

            Artisan::call(
                'migrate',
                outputBuffer: $bufferedOutput
            );

            $this->info('Telescope Installed Successfully.');
        }
    }

    private function ideHelper(): void
    {
        $bufferedOutput = new ConsoleOutput();

        $this->info('Installing Ide Helper .....');

        $process = Process::run('composer require --dev barryvdh/laravel-ide-helper');

        if ($process->successful()) {
            Artisan::call('vendor:publish', [
                '--provider' => 'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider',
            ],
                outputBuffer: $bufferedOutput
            );

            $this->info('Ide Helper Installed Successfully');
        }
    }

    private function laravelModules()
    {
        $outputBuffer = new ConsoleOutput();

        Process::run('composer require nwidart/laravel-nwidart-stubs');

        Artisan::call('vendor:publish', [
            '--provider' => "Nwidart\Modules\LaravelModulesServiceProvider",
        ],
            $outputBuffer
        );
    }

    private function fastPaginate()
    {
        $this->info('Installing Fast Paginate ....');

        $process = Process::run('composer require hammerstone/fast-paginate');

        if ($process->successful()) {
            $this->info($process->output());
            $this->info('Installed Successfully');
        }

    }

    private function logViewer(): void
    {
        $this->info('installing Log Viewer ....');

        Process::run('composer require rap2hpoutre/laravel-log-viewer');

        $this->info('Log Viewer Installation Finished');
    }
    private function composerChanges(): void
    {
        $this->info('Making Composer Changes....');

        Composer::start()
            ->push('extra.laravel.dont-discover', 'laravel/telescope', true)
            ->push('extra.laravel.dont-discover', 'barryvdh/laravel-ide-helper', true)
            ->push('autoload.psr-4.Modules\\', 'Modules/')
            ->write();

        $this->info('Reloading Composer....');

        Composer::dumpAutoload();
    }
}
