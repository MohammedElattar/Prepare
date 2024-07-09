<?php

namespace App\Helpers;

class ValidationMessageHelper extends \Elattar\Prepare\Helpers\ValidationMessageHelper
{
    /**
     * Get Name Validation Messages
     */
    public static function stringErrorMessages(string $keyName = 'name', array $replaceDefaultErrorMessages = [], string $translatedKeyName = null): array
    {
        $translatedKeyName = $translatedKeyName ?: $keyName;

        $messages = [
            "$keyName.required" => translate_error_message($keyName, 'required'),
            "$keyName.string" => translate_error_message($keyName, 'string'),
            "$keyName.max" => translate_error_message($keyName, 'max.string'),
        ];

        return static::replaceDefaultErrorMessages(
            $messages,
            $keyName,
            $replaceDefaultErrorMessages,
            $translatedKeyName,
        );
    }

    public static function foreignKeyErrorMessages(string $keyName = 'foreign_key', array $replaceDefaultErrorMessages = [], string $translatedKeyName = null)
    {
        $translatedKeyName = $translatedKeyName ?: $keyName;

        $messages = [
            "$keyName.required" => translate_error_message($translatedKeyName, 'required'),
        ];

        return static::replaceDefaultErrorMessages(
            $messages,
            $keyName,
            $replaceDefaultErrorMessages,
            $translatedKeyName,
        );
    }

    public static function phoneErrorMessages(string $keyName = 'phone', array $replaceDefaultErrorMessages = []): array
    {
        $messages = [
            "$keyName.required" => translate_error_message($keyName, 'required'),
            "$keyName.unique" => translate_error_message($keyName, 'unique'),
        ];

        return static::replaceDefaultErrorMessages(
            $messages,
            $keyName,
            $replaceDefaultErrorMessages
        );
    }

    public static function addressErrorMessages(string $keyName = 'address', array $replaceDefaultErrorMessages = []): array
    {
        $messages = [
            "$keyName.required" => translate_error_message($keyName, 'required'),
        ];

        return static::replaceDefaultErrorMessages($messages, $keyName, $replaceDefaultErrorMessages);
    }

    public static function passwordErrorMessages(string $keyName = 'password', array $replaceDefaultErrorMessages = []): array
    {
        $messages = [
            "$keyName.required" => translate_error_message($keyName, 'required'),
            "$keyName.min" => translate_error_message("$keyName", 'min.string'),
            "$keyName.mixed" => translate_error_message("$keyName", 'password.mixed'),
            "$keyName.symbols" => translate_error_message("$keyName", 'password.symbols'),
        ];

        return static::replaceDefaultErrorMessages($messages, $keyName, $replaceDefaultErrorMessages);
    }

    public static function roleErrorMessages(string $keyName = 'role', array $replaceDefaultErrorMessages = []): array
    {
        $messages = [
            "$keyName.required" => translate_error_message($keyName, 'required'),
        ];

        return static::replaceDefaultErrorMessages(
            $messages,
            $keyName,
            $replaceDefaultErrorMessages
        );
    }

    public static function imageErrorMessages(string $keyName = 'avatar', array $replaceDefaultErrorMessages = []): array
    {
        $messages = [
            "$keyName.required" => translate_error_message($keyName, 'required'),
            "$keyName.image" => translate_error_message($keyName, 'image'),
            "$keyName.mimes" => translate_error_message($keyName, 'mimes'),
            "$keyName.max" => translate_error_message($keyName, 'max.file'),
        ];

        return static::replaceDefaultErrorMessages(
            $messages,
            $keyName,
            $replaceDefaultErrorMessages
        );
    }

    public static function dateErrorMessages(string $keyName = 'date', array $replaceDefaultErrorMessages = []): array
    {
        $messages = [
            "$keyName.required" => translate_error_message($keyName, 'required'),
            "$keyName.format" => translate_error_message($keyName, 'format'),
            "$keyName.after_or_equal" => translate_error_message($keyName, 'after_or_equal'),
            "$keyName.after" => translate_error_message($keyName, 'after'),
        ];

        return static::replaceDefaultErrorMessages($messages, $keyName, $replaceDefaultErrorMessages);
    }

    public static function percentageErrorMessage(string $keyName = 'percentage', array $replaceDefaultErrorMessages = []): array
    {
        $messages = [
            "$keyName.required" => translate_error_message($keyName, 'required'),
            "$keyName.integer" => translate_error_message($keyName, 'integer'),
            "$keyName.min" => translate_error_message($keyName, 'min.numeric'),
            "$keyName.max" => translate_error_message($keyName, 'max.numeric'),
        ];

        return static::replaceDefaultErrorMessages($messages, $keyName, $replaceDefaultErrorMessages);
    }

    public static function integerErrorMessages(string $keyName = 'number', array $replaceDefaultErrorMessages = []): array
    {
        $messages = [
            "$keyName.required" => translate_error_message($keyName, 'required'),
            "$keyName.integer" => translate_error_message($keyName, 'integer'),
            "$keyName.min" => translate_error_message($keyName, 'min.numeric'),
        ];

        return static::replaceDefaultErrorMessages($messages, $keyName, $replaceDefaultErrorMessages);
    }

    public static function doubleErrorMessages(string $keyName = 'number', array $replaceDefaultErrorMessages = []): array
    {
        $messages = [
            "$keyName.required" => translate_error_message($keyName, 'required'),
            "$keyName.numeric" => translate_error_message($keyName, 'numeric'),
            "$keyName.min" => translate_error_message($keyName, 'min.numeric'),
        ];

        return static::replaceDefaultErrorMessages($messages, $keyName, $replaceDefaultErrorMessages);
    }

    public static function longTextErrorMessages(string $keyName = 'text', array $replaceDefaultErrorMessages = []): array
    {
        $messages = [
            "$keyName.required" => translate_error_message($keyName, 'required'),
            "$keyName.string" => translate_error_message($keyName, 'string'),
        ];

        return static::replaceDefaultErrorMessages($messages, $keyName, $replaceDefaultErrorMessages);
    }

    public static function latitudeErrorMessages(string $keyName = 'latitude', array $replaceDefaultErrorMessages = []): array
    {
        $messages = [
            "$keyName.required" => translate_error_message($keyName, 'required'),
            "$keyName.regex" => translate_error_message($keyName, 'regex'),
        ];

        return static::replaceDefaultErrorMessages($messages, $keyName, $replaceDefaultErrorMessages);
    }

    public static function longitudeErrorMessages(string $keyName = 'longitude', array $replaceDefaultErrorMessages = []): array
    {
        $messages = [
            "$keyName.required" => translate_error_message($keyName, 'required'),
            "$keyName.regex" => translate_error_message($keyName, 'regex'),
        ];

        return static::replaceDefaultErrorMessages($messages, $keyName, $replaceDefaultErrorMessages);
    }

    public static function replaceDefaultErrorMessages(
        array $messages,
        string $keyName,
        array $replaceDefaultErrorMessages = [],
        string $translatedKey = null,
    ): array {
        $translatedKey = $translatedKey ?: $keyName;

        foreach ($replaceDefaultErrorMessages as $errorMessageKey => $errorMessageValue) {
            $messages["$keyName.$errorMessageKey"] = translate_error_message($translatedKey, $errorMessageValue);
        }

        return collect($messages)->filter(function ($message) {
            return (bool) $message;
        })->toArray();
    }
}
