<?php

namespace Elattar\Prepare\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Elattar\Prepare\Helpers\Composer start(array $source = [])
 * @method \Elattar\Prepare\Helpers\Composer push(string $keyLevels, mixed $value)
 * @method \Elattar\Prepare\Helpers\Composer write()
 * @method static dumpAutoload()
 * @method static update()
 *
 * @see \Elattar\Prepare\Helpers\Composer
 */
class Composer extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Elattar\Prepare\Helpers\Composer::class;
    }
}
