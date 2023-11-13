<?php

namespace Elattar\Prepare\Traits;

trait Translatable
{
    private static bool $shouldTranslate;

    public function __construct($resource, int|bool $shouldTranslate = false)
    {
        self::$shouldTranslate = is_int($shouldTranslate) ? false : $shouldTranslate;
        parent::__construct($resource);
    }

    public static function shouldTranslate(): bool
    {
        return self::$shouldTranslate;
    }
}
