<?php

namespace Elattar\Prepare\Traits;

use Elattar\Prepare\Helpers\RequestHelper;
use Illuminate\Database\Eloquent\Builder;

trait Publicable
{
    public function scopeWhereActiveIfPublic(Builder $query)
    {
        if (RequestHelper::isPublicRoute()) {
            return $query->whereStatus(1);
        }

        return $query;
    }
}
