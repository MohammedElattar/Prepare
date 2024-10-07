<?php

namespace App\Traits;

use App\Helpers\PaginationHelper;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

trait PaginationTrait
{
    public function scopePaginatedCollection(Builder $builder): LengthAwarePaginator
    {
        return PaginationHelper::paginateData($builder);
    }

    public function scopeDefaultPaginatedCollection(Builder $builder): LengthAwarePaginator
    {
        return $builder->paginate(PaginationHelper::paginationCountPerPage(), page: PaginationHelper::getCurrentPage());
    }
}
