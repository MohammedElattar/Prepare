<?php

namespace Elattar\Prepare\Console\Commands;

use Elattar\Prepare\Facades\Composer;
use Illuminate\Console\Command;

class PublishPrepareCommand extends Command
{
    protected $signature = 'elattar:publish-prepare-files';

    protected $description = 'Publish Helper Files';

    public function handle(): void
    {
        Composer::start()
            ->push(
                'autoload.files',
                'app/Helpers/translator.php',
                true
            )
            ->write();

        $this->info('reloading composer .....');

        Composer::dumpAutoload();

        $this->info('Composer Reloaded Successfully');
    }
}
