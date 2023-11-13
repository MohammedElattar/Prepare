<?php

namespace Elattar\Prepare\Traits;

use Illuminate\Database\Eloquent\Builder;

trait UserTrait
{
    public function scopeGetAllDataIfNotAgency(Builder $query, string $userRelationName = 'user', int $userId = null): void
    {
        //        $userId = $userId ?: auth()->id();
        //        $query->whereHas($userRelationName, function ($query) use ($userId) {
        //            if (UserHelper::getCurrentUserType() == UserHelper::agencyType()) {
        //                $query->whereUserId($userId);
        //            }
        //        });
    }
}
