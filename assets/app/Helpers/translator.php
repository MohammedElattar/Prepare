<?php

if (! function_exists('translate_error_message')) {
    function translate_error_message(string $messageKey, string $validationKey): string
    {
        return __('messages.'.$messageKey).' '.__('validation.'.$validationKey);
    }
}

if (! function_exists('translate_success_message')) {

    function translate_success_message(string $key1, string $key2): string
    {
        return __('messages.'.$key1).' '.__('messages.'.$key2);
    }
}

if (! function_exists('translate_word')) {
    function translate_word(string $word, array $parameters = []): string
    {
        return __('messages.'.$word, $parameters);
    }
}
