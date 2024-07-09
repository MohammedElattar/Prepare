<?php

namespace App\Traits;

use App\Http\Controllers\SearchController;
use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    public function scopeSearchByForeignKey(Builder $builder, string $foreignKeyColumn, string $value = null)
    {
        return $builder->when(
            $value,
            fn($innerQuery) => $innerQuery->where($foreignKeyColumn, $value)
        );
    }

    public function scopeSearchByRelation(Builder $builder, string $relationName, array $columns = ['name'], array $translatedKeys = [], bool $orWhere = false)
    {
        if (! $orWhere) {
            $builder->whereHas($relationName, fn (Builder $query) => $query->searchable($columns, $translatedKeys));
        } else {
            $builder->orWhereHas($relationName, fn (Builder $query) => $query->searchable($columns, $translatedKeys));
        }

        return $builder;
    }

    public function scopeSearchable(Builder $query, array $columns = ['name'], array $translatedKeys = [], bool $orWhere = false, string $handleKeyName = 'handle'): Builder
    {
        SearchController::searchForHandle($query, $columns, request($handleKeyName), $translatedKeys, $orWhere);

        return $query;
    }
}
