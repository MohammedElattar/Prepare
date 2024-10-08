<?php

namespace Elattar\Prepare\Console\Commands;

use Elattar\Prepare\Facades\Composer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class PrepareCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elattar:initialize {--advanced} {--no-commitlint}';
    protected $description = 'This Command Used To Prepare Newly Created Laravel Project To Install all development tools';
    private string $workingDirectory;

    public function __construct()
    {
        parent::__construct();
        $this->workingDirectory = base_path();
    }

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
        $this->commitLint();
        $advanced = $this->option('advanced');
        $noCommitlint = $this->option('no-commitlint');

        if(!$noCommitlint)
        {
            $this->commitLint();
        }

        if ($advanced) {
            $this->logViewer();
        }

        $this->installApi();
        $this->telescope();
        $this->laravelModules();
        $this->fastPaginate();

        $this->info(Process::run('composer update --working-dir=' . $this->workingDirectory)->output());
    }

    private function logViewer(): void
    {
        $this->info('installing Log Viewer ....');
        $this->info(Process::run('composer require opcodesio/log-viewer --dev --working-dir=' . $this->workingDirectory)->output());
    }

    public function installApi(): void
    {
        $this->info('Installing API ....');
        $this->info(Process::run("php $this->workingDirectory/artisan install:api")->output());
    }

    private function telescope(): void
    {
        $this->info('Preparing Telescope .....');
        $this->info(Process::run('composer require laravel/telescope --working-dir=' . $this->workingDirectory)->output());
        $this->info(Process::run("php $this->workingDirectory/artisan telescope:install")->output());
        $this->info(Process::run("php $this->workingDirectory/artisan migrate")->output());
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

    private function commitLint(): void
    {
        $this->info('Installing commitlint, husky to provide git conventional commits ....');
        $this->info('------------------------------------');
        $this->info(Process::run("npm --prefix $this->workingDirectory install --save-dev @commitlint/config-conventional @commitlint/cli husky")->output());
        $this->info('------------------------------------');

        $this->info('Configuring commitlint and husky ....');
        $this->info('------------------------------------');
        $this->info(Process::run("cd $this->workingDirectory && npx husky-init && rm $this->workingDirectory\/.husky/pre-commit")->output());
        $this->info('------------------------------------');

        $this->info('Configuring commitlint and husky ....');
        $this->info(Process::run("cd $this->workingDirectory && rm -f $this->workingDirectory/.husky/commit-msg")->output());
        $this->info(Process::run("cd $this->workingDirectory && npx husky add .husky/commit-msg 'npx --no-install commitlint --edit $1'")->output());
    }

    private function composerChanges(): void
    {
        $this->info('Making Composer Changes....');

        Composer::start()
            ->push('autoload.psr-4.Modules\\', 'Modules/')
            ->push('extra.merge-plugin.include', ["Modules/*/composer.json"])
            ->push('config.allow-plugins.wikimedia/composer-merge-plugin', true)
            ->write();

        $this->info('Reloading Composer....');

        Composer::dumpAutoload();
        Composer::update();
    }
}
