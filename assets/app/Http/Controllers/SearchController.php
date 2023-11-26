<?php

namespace App\Http\Controllers;

use App\Helpers\TranslationHelper;

class SearchController extends Controller
{
    public static function searchForHandle($query, array $searchableKeys, $handle, array $translatedKeys = [])
    {

        if (!is_null($handle)) {

            $isFirstKey = false;
            foreach ($searchableKeys as $key) {
                if (in_array($key, $translatedKeys)) {
                    foreach (config(TranslationHelper::$availableLocales) as $locale) {
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
}
