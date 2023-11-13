<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'field must be accepted.',
    'accepted_if' => 'field must be accepted when :other is :value.',
    'active_url' => 'field must be a valid URL.',
    'after' => 'field must be a date after :date.',
    'after_or_equal' => 'field must be a date after or equal to :date.',
    'alpha' => 'field must only contain letters.',
    'alpha_dash' => 'field must only contain letters, numbers, dashes, and underscores.',
    'alpha_num' => 'field must only contain letters and numbers.',
    'array' => 'field must be an array.',
    'ascii' => 'field must only contain single-byte alphanumeric characters and symbols.',
    'before' => 'field must be a date before :date.',
    'before_or_equal' => 'field must be a date before or equal to :date.',
    'between' => [
        'array' => 'field must have between :min and :max items.',
        'file' => 'field must be between :min and :max kilobytes.',
        'numeric' => 'field must be between :min and :max.',
        'string' => 'field must be between :min and :max characters.',
    ],
    'boolean' => 'field must be true or false.',
    'confirmed' => 'password confirmation not match',
    'current_password' => 'The password is incorrect.',
    'date' => 'field must be a valid date.',
    'date_equals' => 'field must be a date equal to :date.',
    'date_format' => 'field must match the format :format.',
    'decimal' => 'field must have :decimal decimal places.',
    'declined' => 'field must be declined.',
    'declined_if' => 'field must be declined when :other is :value.',
    'different' => 'field and :other must be different.',
    'digits' => 'field must be :digits digits.',
    'digits_between' => 'field must be between :min and :max digits.',
    'dimensions' => 'field has invalid image dimensions.',
    'distinct' => 'field has a duplicate value.',
    'doesnt_end_with' => 'field must not end with one of the following: :values.',
    'doesnt_start_with' => 'field must not start with one of the following: :values.',
    'email' => 'field must be a valid email address.',
    'ends_with' => 'field must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'already exists',
    'file' => 'field must be a file.',
    'filled' => 'field must have a value.',
    'gt' => [
        'array' => 'field must have more than :value items.',
        'file' => 'field must be greater than :value kilobytes.',
        'numeric' => 'field must be greater than :value.',
        'string' => 'field must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'field must have :value items or more.',
        'file' => 'field must be greater than or equal to :value kilobytes.',
        'numeric' => 'field must be greater than or equal to :value.',
        'string' => 'field must be greater than or equal to :value characters.',
    ],
    'image' => 'field must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'field must exist in :other.',
    'integer' => 'field must be an integer.',
    'ip' => 'field must be a valid IP address.',
    'ipv4' => 'field must be a valid IPv4 address.',
    'ipv6' => 'field must be a valid IPv6 address.',
    'json' => 'field must be a valid JSON string.',
    'lowercase' => 'field must be lowercase.',
    'lt' => [
        'array' => 'field must have less than :value items.',
        'file' => 'field must be less than :value kilobytes.',
        'numeric' => 'field must be less than :value.',
        'string' => 'field must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'field must not have more than :value items.',
        'file' => 'field must be less than or equal to :value kilobytes.',
        'numeric' => 'field must be less than or equal to :value.',
        'string' => 'field must be less than or equal to :value characters.',
    ],
    'mac_address' => 'field must be a valid MAC address.',
    'max' => [
        'array' => 'field must not have more than :max items.',
        'file' => 'field must not be greater than :max kilobytes.',
        'numeric' => 'field must not be greater than :max.',
        'string' => 'field must not be greater than :max characters.',
    ],
    'max_digits' => 'field must not have more than :max digits.',
    'mimes' => 'field must be a file of type: :values.',
    'mimetypes' => 'field must be a file of type: :values.',
    'min' => [
        'array' => 'field must have at least :min items.',
        'file' => 'field must be at least :min kilobytes.',
        'numeric' => 'field must be at least :min.',
        'string' => 'field must be at least :min characters.',
    ],
    'min_digits' => 'field must have at least :min digits.',
    'missing' => 'field must be missing.',
    'missing_if' => 'field must be missing when :other is :value.',
    'missing_unless' => 'field must be missing unless :other is :value.',
    'missing_with' => 'field must be missing when :values is present.',
    'missing_with_all' => 'field must be missing when :values are present.',
    'multiple_of' => 'field must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'field format is invalid.',
    'numeric' => 'field must be a number.',
    'password' => [
        'letters' => 'field must contain at least one letter.',
        'mixed' => 'field must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'field must contain at least one number.',
        'symbols' => 'field must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'field must be present.',
    'prohibited' => 'field is prohibited.',
    'prohibited_if' => 'field is prohibited when :other is :value.',
    'prohibited_unless' => 'field is prohibited unless :other is in :values.',
    'prohibits' => 'field prohibits :other from being present.',
    'regex' => 'field format is invalid.',
    'required' => 'field is required.',
    'required_array_keys' => 'field must contain entries for: :values.',
    'required_if' => 'field is required when :other is :value.',
    'required_if_accepted' => 'field is required when :other is accepted.',
    'required_unless' => 'field is required unless :other is in :values.',
    'required_with' => 'field is required when :values is present.',
    'required_with_all' => 'field is required when :values are present.',
    'required_without' => 'field is required when :values is not present.',
    'required_without_all' => 'field is required when none of :values are present.',
    'same' => 'field must match :other.',
    'size' => [
        'array' => 'field must contain :size items.',
        'file' => 'field must be :size kilobytes.',
        'numeric' => 'field must be :size.',
        'string' => 'field must be :size characters.',
    ],
    'starts_with' => 'field must start with one of the following: :values.',
    'string' => 'field must be a string.',
    'timezone' => 'field must be a valid timezone.',
    'unique' => 'has already been taken.',
    'uploaded' => 'failed to upload.',
    'uppercase' => 'field must be uppercase.',
    'url' => 'field must be a valid URL.',
    'ulid' => 'field must be a valid ULID.',
    'uuid' => 'field must be a valid UUID.',
    'invalid' => 'field Is Invalid',
    'taken' => 'field is already taken',
    'wrong_credentials' => 'Wrong Credentials',
    'validation_errors' => 'Validation_errors',
    'success' => 'Success',
    'error' => 'Error',
    'not_found' => 'Not Found',
    'not_exists' => 'does not exists',
    'project' => [
        'price' => 'is bigger than project price',
        'completed' => 'end date is passed',
    ],
    'quantity' => [
        'bigger' => 'is bigger than existing which is ',
    ],
    'wrong' => 'is wrong',
    'captcha' => 'is invalid',
    'inactive' => 'is inactive',
    'custom_distinct' => 'field has duplicate items',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],
    'not_verified' => 'is not verified',
    'frozen' => 'account is frozen',
];
