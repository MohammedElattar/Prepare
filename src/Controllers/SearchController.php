<?php

namespace Elattar\Prepare\Controllers;

use App\Helpers\TranslationHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Routing\Controller;

class SearchController extends Controller
{
    public static function searchForHandle(Builder $query, array $searchableKeys, $handle, array $translatedKeys = []): void
    {
        if (! is_null($handle)) {
            $newTranslatedKeys = [];

            for($i = 0; $i<count($searchableKeys); $i++)
            {
                $tmpKey = $searchableKeys[$i];

                if(in_array($tmpKey, $translatedKeys))
                {
                    $newTranslatedKeys = array_map(fn($locale) => "$tmpKey->$locale", TranslationHelper::$availableLocales);
                    $searchableKeys[$i] = null;
                }
            }

            $query
                ->when($newTranslatedKeys, fn($query) => $query->whereAny($newTranslatedKeys, 'like', "%$handle%"))
                ->whereAny(array_filter($searchableKeys), 'like', "%$handle%");
        }
    }
}