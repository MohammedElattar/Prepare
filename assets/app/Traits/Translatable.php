<?php

namespace App\Traits;

trait Translatable
{
    private static bool $shouldTranslate;

    public function __construct($resource, int|bool $shouldTranslate = false)
    {
        parent::__construct($resource);

        self::$shouldTranslate = is_int($shouldTranslate) ? false : $shouldTranslate;
    }

    public static function shouldTranslate(): bool
    {
        return self::$shouldTranslate;
    }
}
