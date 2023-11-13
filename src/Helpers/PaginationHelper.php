<?php

namespace Elattar\Prepare\Helpers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class PaginationHelper
{
    /**
     * Paginate collection if the request is coming from first party frontend ( SPA )
     * else return the normal collection for mobile application
     */
    public static function formatResult(Builder $builder): array|Collection|LengthAwarePaginator|\Illuminate\Support\Collection
    {
        if (RequestHelper::isFirstPartyFrontend()) {
            return static::paginateData($builder);
        }

        return $builder->get();
    }

    public static function paginationCountPerPage(): int
    {
        $count = request('per_page') ?: 5;

        return ($count >= 5 && $count <= 100) ? $count : 5;
    }

    public static function paginateData(Builder $builder): LengthAwarePaginator
    {
        return $builder->fastPaginate(self::paginationCountPerPage());
    }
}
