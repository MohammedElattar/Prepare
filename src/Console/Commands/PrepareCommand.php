<?php

namespace Elattar\Prepare\Console\Commands;

use Elattar\Prepare\Facades\Composer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class PrepareCommand extends Command
{
    private string $workingDirectory;

    public function __construct()
    {
        parent::__construct();
        $this->workingDirectory = base_path();
    }
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
        $this->installDependencies();
        $this->composerChanges();
        $this->info('Done');
    }

    private function installDependencies(): void
    {
        $this->installApi();
        $this->laravelOctane();
        $this->telescope();
        $this->ideHelper();
        $this->laravelModules();
        $this->fastPaginate();
        $this->logViewer();
        $this->laravelBackup();
    }

    private function telescope(): void
    {
        $this->info('Preparing Telescope .....');
        $this->info(Process::run('composer require laravel/telescope --working-dir=' . $this->workingDirectory)->output());
        $this->info(Process::run("php $this->workingDirectory/artisan telescope:install")->output());
        $this->info(Process::run("php $this->workingDirectory/artisan migrate")->output());
    }

    public function installApi(): void
    {
        $this->info('Installing API ....');
        $this->info(Process::run("php $this->workingDirectory/artisan install:api")->output());
    }

    private function ideHelper(): void
    {
        $this->info('Installing Ide Helper .....');
        $this->info(Process::run('composer require --dev barryvdh/laravel-ide-helper --working-dir=' . $this->workingDirectory)->output());
    }

    private function laravelModules(): void
    {
        $this->info('Installing Laravel Modules ......');
        $this->info(Process::run("composer require nwidart/laravel-modules --working-dir=$this->workingDirectory")->output());
    }

    private function fastPaginate(): void
    {
        $this->info('Installing Fast Paginate ....');
        $this->info(Process::run('composer require elattar/fast-paginate --working-dir=' . $this->workingDirectory)->output());
    }

    public function laravelOctane(): void
    {
        $this->info('Installing Laravel Octane .....');
        $this->info(Process::run('composer require laravel/octane --working-dir=' . $this->workingDirectory)->output());
        $this->info(Process::run("php $this->workingDirectory/artisan octane:install --server=frankenphp")->output());
    }

    private function logViewer(): void
    {
        $this->info('installing Log Viewer ....');
        $this->info(Process::run('composer require opcodesio/log-viewer --dev --working-dir=' . $this->workingDirectory)->output());
    }

    public function laravelBackup(): void
    {
        $this->info('Installing Laravel Backup .....');
        $this->info(Process::run('composer require spatie/laravel-backup --working-dir=' . $this->workingDirectory)->output());
    }

    private function composerChanges(): void
    {
        $this->info('Making Composer Changes....');

        Composer::start()
            ->push('autoload.psr-4.Modules\\', 'Modules/')
            ->write();

        $this->info('Reloading Composer....');

        Composer::dumpAutoload();
        Composer::update();
    }
}
