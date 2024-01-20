<?php

namespace Elattar\Prepare\Helpers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class PaginationHelper
{
    public static function paginationCountPerPage(): int
    {
        $count = request('per_page') ?: 5;

        return ($count >= 5 && $count <= 100) ? $count : 5;
    }

    public static function paginateData(Builder $builder): LengthAwarePaginator
    {
        return $builder->fastPaginate(self::paginationCountPerPage(), page: self::getCurrentPage());
    }

    public static function getCurrentPage()
    {
        return request('page') ?: 1;
    }
}
