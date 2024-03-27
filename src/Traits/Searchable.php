<?php

namespace Elattar\Prepare\Traits;

use App\Http\Controllers\SearchController;
use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    public function scopeSearchable(Builder $query, array $columns = ['name'], array $translatedKeys = [], string $handleKeyName = 'handle'): Builder
    {
        SearchController::searchForHandle($query, $columns, request($handleKeyName), $translatedKeys);

        return $query;
    }

    public function scopeSearchByForeignKey(Builder $builder, string $foreignKeyColumn, string $value = null)
    {
        return $builder->when(
            $value,
            fn($innerQuery) => $innerQuery->where($foreignKeyColumn, $value)
        );
    }
}
