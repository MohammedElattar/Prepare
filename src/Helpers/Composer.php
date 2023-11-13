<?php

namespace Elattar\Prepare\Helpers;

use Illuminate\Support\Facades\Process;

class Composer
{
    const COMPOSER_FILE_NAME = 'composer.json';

    private array $source = [];

    public function start(array $source = [])
    {
        if ($source) {
            $this->source = $source;
        } else {
            $this->parseComposerContent();
        }

        return $this;
    }

    public function parseComposerContent(): static
    {
        $composerFilePath = base_path(self::COMPOSER_FILE_NAME);

        $this->source = json_decode(file_get_contents($composerFilePath), true);

        return $this;
    }

    public function write(): bool
    {
        $stream = fopen(base_path(self::COMPOSER_FILE_NAME), 'w');

        fwrite($stream, json_encode($this->source, JSON_UNESCAPED_SLASHES));

        return fclose($stream);
    }

    /**
     * @return $this
     */
    public function push(
        string $keyLevels,
        mixed $value,
        bool $shouldPush = false,
    ) {
        $source = $this->source;

        $sourceRef = &$source;
        $keys = explode('.', $keyLevels);

        while ($tmpKey = array_shift($keys)) {
            $sourceRef[$tmpKey] = $sourceRef[$tmpKey] ?? null;

            $sourceRef = &$sourceRef[$tmpKey];
        }

        if ($shouldPush) {
            $sourceRef[] = $value;
            $sourceRef = array_unique($sourceRef);
        } else {
            $sourceRef = $value;
        }

        $this->source = $source;

        return $this;
    }

    public function dumpAutoload(): bool
    {
        $process = Process::run('composer dump-autoload');

        return $process->successful();
    }

    public function update(): bool
    {
        $process = Process::run('composer update');

        return $process->successful();
    }
}
