<?php

namespace App\Helpers;

use App\Helpers\DateHelper;
use App\Helpers\TranslationHelper;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ValidationRuleHelper
{
    public static function defaultPasswordRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'confirmed' => 'confirmed',
            'password' => Password::default(),
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function getUniqueColumn(bool $inUpdate, string $table, $idValue, string $column = 'email', $ignoredColumn = 'id')
    {
        $ignoredColumn = $inUpdate ? $ignoredColumn : null;

        return "unique:$table,$column" . ($inUpdate ? (",$idValue,$ignoredColumn") : '');
    }

    public static function sameLoggedUserPassword(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'current_password' => 'current_password',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function enumRules(array $in, array $replaceDefaultRules = [])
    {
        $rules = [
            'required' => 'required',
            'in' => Rule::in($in),
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function excelRules(array $replaceDefaultRules = [])
    {
        $rules = [
            'required' => 'required',
            'file' => 'file',
            'mimes' => 'mimes:xlsx',
            'max' => 'max:50000',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function doubleRules(array $replaceDefaultRules = [])
    {
        $rules = [
            'required' => 'required',
            'numeric' => 'numeric',
            'min' => 'min:1',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function booleanRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'boolean' => 'boolean',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function phoneRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'numeric' => 'numeric',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function usernameRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'regex' => 'regex:/[a-zA-Z][a-zA-Z0-9_ ]{5,}$/',
            'max' => 'max:255',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    /** Get Image Rules For Store or Update
     * @return string[]
     */
    public static function storeOrUpdateImageRules(bool $inUpdate = false, array $replaceDefaultRules = []): array
    {

        $rules = [
            'required' => $inUpdate ? 'sometimes' : 'required',
            'type' => 'image',
            'mimes' => 'mimes:jpeg,png,jpg',
            'max' => 'max:10000', // 10mg
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function emailRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'email' => 'email',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function fileRules(bool $inUpdate = false, array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => $inUpdate ? 'sometimes' : 'required',
            'file' => 'file',
            'mimes' => 'mimes:jpeg,png,jfif,gif,mp3,m4a,3gp,mpga,x-aac,webp,wav,webm,wma,mp4,x-m4a',
            'max' => 'max:2000', // 2 MB
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);

    }

    /**
     * @return string[]
     */
    public static function addressRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'type' => 'string',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function roleRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function dateRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'date_format' => 'date_format:' . DateHelper::defaultDateFormat(),
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function dateTimeRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'date_format' => 'date_format:' . DateHelper::defaultDateTimeFormat(),
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function yearRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'date_format' => 'date_format:' . DateHelper::defaultYearFormat(),
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function timeRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'date_format' => 'date_format:' . DateHelper::defaultTimeFormat(),
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function convertJsonToArray(string $json)
    {
        return json_decode($json, true);
    }

    public static function percentageRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'integer' => 'integer',
            'min' => 'min:1',
            'max' => 'max:100',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function foreignKeyRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);

    }

    public static function integerRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'integer' => 'integer',
            'min' => 'min:1',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function unsignedTinyInteger(array $replaceDefaultRules = []): array
    {
        return static::integerRules([
            ...$replaceDefaultRules,
            'max' => 'max:127',
        ]);
    }

    public static function tinyInteger(array $replaceDefaultRules = [])
    {
        return static::integerRules([
            ...$replaceDefaultRules,
            'max' => 'max:127',
        ]);
    }

    public static function unsignedSmallInteger(array $replaceDefaultRules = [])
    {
        return static::integerRules([
            ...$replaceDefaultRules,
            'max' => 'max:65535',
        ]);
    }

    public static function smallInteger(array $replaceDefaultRules = [])
    {
        return static::integerRules([
            ...$replaceDefaultRules,
            'max' => 'max:32767',
        ]);
    }

    public static function hexColorRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'string' => 'string',
            'regex' => 'regex:/^#([A-Fa-f0-9]{6})$/',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function arrayRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'array' => 'array',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function keyExists(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'exists' => 'exists:users,phone',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function translatedArray(string $keyName = 'name', array $excludedLanguages = [], string $valueType = 'string', array $replaceDefaultRules = [])
    {
        $acceptedLocales = array_diff(TranslationHelper::$availableLocales, $excludedLanguages);
        $rules = [];

        foreach ($acceptedLocales as $locale) {

            if ($locale == app()->getLocale()) {
                $replaceDefaultRules['sometimes'] = '';
                $replaceDefaultRules['required'] = 'required';
            } else {
                $replaceDefaultRules['sometimes'] = 'sometimes';
                $replaceDefaultRules['required'] = '';
            }

            $rules["$keyName.$locale"] = static::getValueType($valueType, $replaceDefaultRules);
        }

        return $rules;
    }

    public static function getValueType(string $valueType, array $replaceDefaultRules = [])
    {
        return static::allValuesTypes($replaceDefaultRules)[$valueType];
    }

    public static function allValuesTypes(array $replaceDefaultRules = [])
    {
        return [
            'string' => static::stringRules($replaceDefaultRules),
            'longText' => static::longTextRules($replaceDefaultRules),
        ];
    }

    /**
     * @return string[]
     */
    public static function stringRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'type' => 'string',
            'max' => 'max:255',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function longTextRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'string' => 'string',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function urlRules(bool $required = true, array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => $required ? 'required' : 'nullable',
            'url' => 'url',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function latitudeRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'regex' => 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function uniqueTranslatedKey(
        string $model,
        array $value,
        array &$errors,
               $modelID = null,
        string $keyName = 'name',
        string $translatedKeyName = null,
        array $additionalConditions = [],
    ): bool|array {
        $availableLocales = TranslationHelper::$availableLocales;

        $model = new $model;
        $query = $model::query();

        $query->where(function ($query) use ($availableLocales, $keyName, $value) {
            foreach ($availableLocales as $locale) {
                if ($locale == app()->getLocale()) {
                    $query->where("$keyName->$locale", $value[$locale]);
                } elseif (isset($value[$locale])) {
                    $query->orWhere("$keyName->$locale", $value[$locale]);
                }
            }
        });

        foreach ($additionalConditions as $condition) {
            $query->where(...$condition);
        }

        $item = $query
            ->when(
                $modelID,
                fn($innerQuery) => $innerQuery->where('id', '<>', $modelID)
            )
            ->first();

        if ($item) {
            $translatedKeyName = $translatedKeyName ?: $keyName;

            foreach ($availableLocales as $locale) {
                $translatedKey = $item->getTranslations($keyName);

                $translatedKey[$locale] = $translatedKey[$locale] ?? null;
                $value[$locale] = $value[$locale] ?? null;

                if (
                    $translatedKey[$locale]
                    && $value[$locale]
                    && $translatedKey[$locale] == $value[$locale]
                ) {
                    $errors["$keyName.$locale"] = translate_error_message($translatedKeyName, 'exists');

                    return $errors;
                }
            }
        }

        return true;
    }

    public static function longitudeRules(array $replaceDefaultRules = []): array
    {
        $rules = [
            'required' => 'required',
            'regex' => 'regex:/^[-]?(([0-9]?[0-9]|1[0-7][0-9])\.(\d+))|(180(\.0+)?)$/',
        ];

        return static::replaceDefaultRules($rules, $replaceDefaultRules);
    }

    public static function replaceDefaultRules(array $rules, array $replaceDefaultRules): array
    {
        foreach ($replaceDefaultRules as $ruleKey => $ruleValue) {
            $rules[$ruleKey] = $ruleValue;
        }

        return collect(array_values($rules))->filter(function ($rule) {
            return (bool) $rule;
        })->toArray();
    }
}
