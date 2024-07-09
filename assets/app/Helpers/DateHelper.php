<?php

namespace App\Helpers;

use Carbon\CarbonInterface;
use Illuminate\Support\Carbon;

class DateHelper
{
    const WEEK_START_DAY = Carbon::SUNDAY;

    public static function getFormattedDate(?string $date): string
    {
        return $date ? (new Carbon($date))->format(static::defaultDateTimeFormat()) : '';
    }

    public static function defaultDateTimeFormat(): string
    {
        return 'Y-m-d H:i';
    }

    public static function amPmFormat()
    {
        return 'Y-m-d h:i a';
    }

    public static function defaultDateFormat(): string
    {
        return 'Y-m-d';
    }

    public static function defaultYearFormat()
    {
        return 'Y';
    }

    public static function dateDiffForHumans(Carbon $date = null): string
    {
        $date = $date ?: now();

        return $date->diffForHumans(now(), CarbonInterface::DIFF_RELATIVE_AUTO, short: true);
    }

    public static function defaultTimeFormat()
    {
        return 'H:i';
    }

    public static function formatTime($time = null)
    {
        $time = $time ?: now();

        return Carbon::parse($time)->format(static::defaultTimeFormat());
    }
}
