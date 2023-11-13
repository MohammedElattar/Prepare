<?php

namespace Elattar\Prepare\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Sluggable
{
    public function scopeWhereUniqueTranslatedKey(Builder $builder, array $translatedArray, string $key = 'slug')
    {
        return $builder->where(function ($query) use ($translatedArray, $key) {
            $isFirstKey = true;
            foreach ($translatedArray as $locale => $value) {
                if ($isFirstKey) {
                    $query->where("$key->$locale", $value);
                    $isFirstKey = false;
                } else {
                    $query->orWhere("$key->$locale", $value);
                }
            }
        });
    }
}
