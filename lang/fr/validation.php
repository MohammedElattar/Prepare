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

    'accepted' => 'le champ doit être accepté.',
    'accepted_if' => 'le champ doit être accepté lorsque :other is :value.',
    'active_url' => 'le champ doit être une URL valide.',
    'after' => 'le champ doit être une date postérieure :date.',
    'after_or_equal' => 'le champ doit être une date postérieure ou égale à :date.',
    'alpha' => 'le champ ne doit contenir que des lettres.',
    'alpha_dash' => 'le champ ne doit contenir que des lettres, des chiffres, des tirets et des soulignements.',
    'alpha_num' => 'le champ ne doit contenir que des lettres et des chiffres.',
    'array' => 'le champ doit être un tableau.',
    'ascii' => 'Le champ ne doit contenir que des caractères et des symboles alphanumériques à un octet.',
    'before' => 'Le champ doit être une date antérieure :date.',
    'before_or_equal' => 'Le champ doit être une date antérieure ou égale à :date.',
    'between' => [
        'array' => 'le champ doit avoir entre :min and :max items.',
        'file' => 'le champ doit être entre :min and :max kilobytes.',
        'numeric' => 'le champ doit être entre :min and :max.',
        'string' => 'le champ doit être entre :min and :max characters.',
    ],
    'boolean' => 'le champ doit être vrai ou faux.',
    'confirmed' => 'La confirmation du mot de passe ne correspond pas',
    'current_password' => 'Le mot de passe est incorrect.',
    'date' => 'le champ doit être une date valide.',
    'date_equals' => 'le champ doit être une date égale à :date.',
    'date_format' => 'le champ doit correspondre au format :format.',
    'decimal' => 'le champ doit avoir :decimal decimal places.',
    'declined' => 'le champ doit être refusé.',
    'declined_if' => 'le champ doit être refusé lorsque :other is :value.',
    'different' => 'Le champ est :other must be different.',
    'digits' => 'le champ doit être :digits digits.',
    'digits_between' => 'le champ doit être entre :min and :max digits.',
    'dimensions' => 'champ avec des dimensions d’image non valides.',
    'distinct' => 'le champ a une valeur en double.',
    'doesnt_end_with' => 'le champ ne doit pas se terminer par l’une des réponses suivantes: :values.',
    'doesnt_start_with' => 'le champ ne doit pas commencer par l’une des: :values.',
    'email' => 'le champ doit être une adresse courriel valide.',
    'ends_with' => 'le champ doit se terminer par l’un des éléments suivants: :values.',
    'enum' => 'La sélection :attribute is invalid.',
    'exists' => 'existe déjà',
    'file' => 'le champ doit être un fichier.',
    'filled' => 'le champ doit avoir une valeur.',
    'gt' => [
        'array' => 'le champ doit avoir plus de :value items.',
        'file' => 'le champ doit être supérieur à :value kilobytes.',
        'numeric' => 'le champ doit être supérieur à :value.',
        'string' => 'le champ doit être supérieur à :value characters.',
    ],
    'gte' => [
        'array' => 'le champ doit avoir :value items or more.',
        'file' => 'le champ doit être supérieure ou égale à :value kilobytes.',
        'numeric' => 'le champ doit être supérieure ou égale à :value.',
        'string' => 'le champ doit être supérieure ou égale à :value characters.',
    ],
    'image' => 'champ doit être une image.',
    'in' => 'La sélection :attribute is invalid.',
    'in_array' => 'le champ doit exister dans :other.',
    'integer' => 'le champ doit être une adresse IP valide.',
    'ip' => 'le chaamp doit être une adresse IP valide.',
    'ipv4' => 'le champ doit être une adresse IPv4 valide.',
    'ipv6' => 'le champ doit être une adresse IPv6 valide.',
    'json' => 'champ doit être une chaîne JSON valide.',
    'lowercase' => 'champ doit être en minuscules.',
    'lt' => [
        'array' => 'le champ doit avoir moins de :value items.',
        'file' => 'le champ doit être inférieur à :value kilobytes.',
        'numeric' => 'le champ doit être inférieur à :value.',
        'string' => 'le champ doit être inférieur à :value characters.',
    ],
    'lte' => [
        'array' => 'le champ ne doit pas avoir plus de :value items.',
        'file' => 'le champ doit être inférieure ou égale à :value kilobytes.',
        'numeric' => 'le champ doit être inférieure ou égale à :value.',
        'string' => 'le champ doit être inférieure ou égale à :value characters.',
    ],
    'mac_address' => 'le champ doit être une adresse MAC valide.',
    'max' => [
        'array' => 'le champ ne doit pas avoir plus de :max items.',
        'file' => 'le champ ne doit pas être supérieure à :max kilobytes.',
        'numeric' => 'le champ ne doit pas être supérieure à :max.',
        'string' => 'le champ ne doit pas être supérieure à :max characters.',
    ],
    'max_digits' => 'le champ ne doit pas avoir plus de :max digits.',
    'mimes' => 'le champ doit être un fichier de type: :values.',
    'mimetypes' => 'le format du champ n’est pas valide: :values.',
    'min' => [
        'array' => 'le champ doit avoir au moins :min items.',
        'file' => 'le champ doit être au moins :min kilobytes.',
        'numeric' => 'le champ doit être au moins :min.',
        'string' => 'le champ doit être au moins :min characters.',
    ],
    'min_digits' => 'champ doit avoir au moins :min digits.',
    'missing' => 'le champ doit être manquant.',
    'missing_if' => 'le champ doit être manquant lorsque :other is :value.',
    'missing_unless' => 'le champ doit être manquant sauf si :other is :value.',
    'missing_with' => 'le champ doit être manquant lorsque :values is present.',
    'missing_with_all' => 'le champ doit être manquant lorsque :values are present.',
    'multiple_of' => 'le champ doit être un multiple de :value.',
    'not_in' => 'La sélection :attribute is invalid.',
    'not_regex' => 'le format du champ n’est pas valide.',
    'numeric' => 'champ doit être un nombre.',
    'password' => [
        'letters' => 'le champ doit contenir au moins une lettre.',
        'mixed' => 'le champ doit contenir au moins une lettre. ',
        'mixed' => 'le champ doit contenir au moins une majuscule et une minuscule.',
        'numbers' => 'le champ doit contenir au moins un numéro.',
        'symbols' => 'le champ doit contenir au moins un symbole.',
        'uncompromised' => 'le donné :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'le champ doit être présent.',
    'prohibited' => 'le champ est interdit.',
    'prohibited_if' => 'le champ est interdit lorsque :other is :value.',
    'prohibited_unless' => 'le champ est interdit sauf :other is in :values.',
    'prohibits' => 'le champ interdit :other from being present.',
    'regex' => 'le format du champ n’est pas valide.',
    'required' => 'le champ est requis.',
    'required_array_keys' => 'le champ doit contenir des entrées pour: :values.',
    'required_if' => 'le champ est requis lorsque :other is :value.',
    'required_if_accepted' => 'le champ est requis lorsque :other is accepted.',
    'required_unless' => 'le champ est requis sauf :other is in :values.',
    'required_with' => 'le champ est requis lorsque :values is present.',
    'required_with_all' => 'le champ est requis lorsque :values are present.',
    'required_without' => 'le champ est requis lorsque :values is not present.',
    'required_without_all' => 'le champ est nécessaire lorsqu’aucune :values are present.',
    'same' => 'le champ doit correspondre :other.',
    'size' => [
        'array' => 'le champ doit contenir :size items.',
        'file' => 'le champ doit être :size kilobytes.',
        'numeric' => 'le champ doit être :size.',
        'string' => 'le champ doit être :size characters.',
    ],
    'starts_with' => 'le champ doit commencer par l’une des: :values.',
    'string' => 'le champ doit être une chaîne.',
    'timezone' => 'le champ doit être un fuseau horaire valide.',
    'unique' => 'le champa déjà été pris.',
    'uploaded' => 'Echec du Téléchargement.',
    'uppercase' => 'le champ doit être en majuscules.',
    'url' => 'le champ doit être une URL valide.',
    'ulid' => 'le champ doit être un ULID valide.',
    'uuid' => 'le champ doit être un UUID valide.',
    'invalid' => "champ n'est pas valide",
    'taken' => 'le champ est déjà pris',
    'wrong_credentials' => 'Faux justificatifs d’identité',
    'validation_errors' => 'erreurs de validation',
    'success' => 'Succès',
    'error' => 'Erreur',
    'not_found' => 'introuvable',
    'not_exists' => "n'existe pas",
    'project' => [
        'price' => 'est supérieure au prix du projet',
        'completed' => 'date de fin est passée',
    ],
    'quantity' => [
        'bigger' => 'est plus grand que l’existant qui est ',
    ],
    'wrong' => 'est faux',
    'captcha' => "n'est pas valide",
    'inactive' => 'est inactif',
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
            'rule-name' => 'message du client',
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
    'not_verified' => "n'est pas vérifié",
    'frozen' => 'compte est bloqué',
];
