<?php

namespace Elattar\Prepare\Traits;

use Elattar\Prepare\Helpers\PaginationHelper;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

trait PaginationTrait
{
    public function scopeFormatResult(Builder $query): Collection|LengthAwarePaginator|array|\Illuminate\Support\Collection
    {
        return PaginationHelper::formatResult($query);
    }

    public function scopePaginatedCollection(Builder $builder): LengthAwarePaginator
    {
        return PaginationHelper::paginateData($builder);
    }
}
