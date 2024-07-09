<?php

namespace App\Http\Controllers;

use App\Helpers\TranslationHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Routing\Controller;

class SearchController extends Controller
{
    public static function searchForHandle(Builder $query, array $searchableKeys, $handle, array $translatedKeys = [], bool $orWhere = false): void
    {
        if (!is_null($handle)) {
            if (!$orWhere) {
                $query->where(fn(Builder $builder) => static::searchLogic($builder, $searchableKeys, $handle, $translatedKeys));
            } else {
                $query->orWhere(fn(Builder $builder) => static::searchLogic($builder, $searchableKeys, $handle, $translatedKeys));
            }
        }
    }

    private static function searchLogic(Builder $query, array $searchableKeys, $handle, array $translatedKeys = []): void
    {
        $isFirstKey = false;
        foreach ($searchableKeys as $key) {
            if (in_array($key, $translatedKeys)) {
                foreach (TranslationHelper::$availableLocales as $locale) {
                    if (!$isFirstKey) {
                        $query->where("$key->$locale", 'like', "%$handle%");
                        $isFirstKey = true;
                    } else {
                        $query->orWhere("$key->$locale", 'like', "%$handle%");
                    }
                }
            } else {
                if (!$isFirstKey) {
                    $query->where($key, 'like', "%$handle%");
                    $isFirstKey = true;
                } else {
                    $query->orWhere($key, 'like', "%$handle%");
                }
            }
        }
    }
}
