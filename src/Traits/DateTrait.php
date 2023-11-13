<?php

namespace Elattar\Prepare\Traits;

use Illuminate\Database\Eloquent\Builder;

trait DateTrait
{
    public function scopeWhereToday(Builder $query, string $column = 'created_at')
    {
        $query->whereDate($column, now());
    }
}
