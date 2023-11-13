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

    'accepted' => 'مجال يجب قبوله.',
    'accepted_if' => 'يجب قبول المجال عندما :other is :value.',
    'active_url' => 'يجب أن يكون عنوان URL صالحًا.',
    'after' => 'يجب أن يكون الحقل موعدًا بعد :date.',
    'after_or_equal' => 'يجب أن يكون تاريخًا بعد أو يساوي :date.',
    'alpha' => 'يجب أن يحتوي الحقل على رسائل فقط.',
    'alpha_dash' => 'يجب أن يحتوي على حروف وأرقام وشرطات وتأكيدات فقط.',
    'alpha_num' => 'يجب أن يحتوي الحقل على أحرف وأرقام فقط.',
    'array' => 'يجب أن يكون المجال مصفوفة.',
    'ascii' => 'يجب أن يحتوي المجال فقط على أحرف ورموز أبجدية أحادية البايت.',
    'before' => 'يجب أن يكون الحقل موعدًا قبل :date.',
    'before_or_equal' => 'يجب أن يكون تاريخًا قبل أو يساوي :date.',
    'between' => [
        'array' => 'يجب أن يكون بين الحقل :min and :max items.',
        'file' => 'يجب أن يكون الحقل بين :min and :max kilobytes.',
        'numeric' => 'يجب أن يكون الحقل بين :min and :max.',
        'string' => 'يجب أن يكون الحقل بين :min and :max characters.',
    ],
    'boolean' => 'يجب أن يكون المجال صحيحًا أو خاطئًا.',
    'confirmed' => 'تأكيد كلمة السر غير مطابق',
    'current_password' => 'كلمة مرور غير صحيحة.',
    'date' => 'يجب أن يكون الحقل تاريخًا صحيحًا.',
    'date_equals' => 'يجب أن يكون تاريخًا مساويًا لتاريخ :date.',
    'date_format' => 'يجب أن يتطابق الحقل مع الشكل :format.',
    'decimal' => 'يجب أن يكون الحقل :decimal decimal places.',
    'declined' => 'يجب ان يكون الحقل مرفوضاً.',
    'declined_if' => 'يجب رفض المجال عندما :other is :value.',
    'different' => 'الحقل و :other must be different.',
    'digits' => 'الحقل يجب ان يكون :digits digits.',
    'digits_between' => 'يجب أن يكون الحقل بين :min and :max digits.',
    'dimensions' => 'الحقل له أبعاد صورة غير صالحة.',
    'distinct' => 'الحقل له قيمة مكررة.',
    'doesnt_end_with' => 'يجب ألا ينتهي الحقل بواحد مما يلي: :values.',
    'doesnt_start_with' => 'يجب ألا يبدأ الحقل بواحد مما يلي: :values.',
    'email' => 'يجب أن يكون عنوان بريد إلكتروني صالحًا.',
    'ends_with' => 'يجب أن ينتهي الحقل بواحد مما يلي: :values.',
    'enum' => 'مختار :attribute is invalid.',
    'exists' => 'موجود بالفعل',
    'file' => 'يجب أن يكون الحقل ملفًا.',
    'filled' => 'يجب أن يكون للحقل قيمة.',
    'gt' => [
        'array' => 'يجب أن يكون المجال أكثر من :value items.',
        'file' => 'يجب أن يكون المجال أكبر من :value kilobytes.',
        'numeric' => 'يجب أن يكون المجال أكبر من :value.',
        'string' => 'يجب أن يكون المجال أكبر من :value characters.',
    ],
    'gte' => [
        'array' => 'يجب أن يكون المجال :value items or more.',
        'file' => 'يجب أن يكون أكبر من أو يساوي :value kilobytes.',
        'numeric' => 'يجب أن يكون أكبر من أو يساوي :value.',
        'string' => 'يجب أن يكون أكبر من أو يساوي :value characters.',
    ],
    'image' => 'يجب ان يكون الحقل صورة.',
    'in' => 'مختار :attribute is invalid.',
    'in_array' => 'يجب أن يكون هناك مجال في :other.',
    'integer' => 'يجب أن يكون الحقل عددًا صحيحًا.',
    'ip' => 'يجب أن يكون عنوان IP صالحًا.',
    'ipv4' => 'يجب أن يكون عنوان IPv4 صالحًا.',
    'ipv6' => 'يجب أن يكون عنوان IPv6 صالحًا.',
    'json' => 'يجب أن يكون الحقل سلسلة JSON صالحة.',
    'lowercase' => 'يجب أن يكون المجال صغيرًا.',
    'lt' => [
        'array' => 'يجب أن يكون الحقل أقل من :value items.',
        'file' => 'يجب أن يكون أقل من :value kilobytes.',
        'numeric' => 'يجب أن يكون أقل من :value.',
        'string' => 'يجب أن يكون أقل من :value characters.',
    ],
    'lte' => [
        'array' => 'يجب ألا يكون المجال أكثر من :value items.',
        'file' => 'يجب أن يكون أقل من أو يساوي :value kilobytes.',
        'numeric' => 'يجب أن يكون أقل من أو يساوي :value.',
        'string' => 'يجب أن يكون أقل من أو يساوي :value characters.',
    ],
    'mac_address' => 'يجب أن يكون عنوان MAC صالحًا.',
    'max' => [
        'array' => 'يجب ألا يكون الحقل أكثر من :max items.',
        'file' => 'يجب ألا يكون الحقل أكبر من :max kilobytes.',
        'numeric' => 'يجب ألا يكون الحقل أكبر من :max.',
        'string' => 'يجب ألا يكون الحقل أكبر من :max characters.',
    ],
    'max_digits' => 'يجب ألا يكون الحقل أكثر من :max digits.',
    'mimes' => 'يجب أن يكون ملفًا من النوع: :values.',
    'mimetypes' => 'يجب أن يكون ملفًا من النوع: :values.',
    'min' => [
        'array' => 'يجب أن يكون المجال على الأقل :min items.',
        'file' => 'يجب أن يكون المجال على الأقل :min kilobytes.',
        'numeric' => 'يجب أن يكون المجال على الأقل :min.',
        'string' => 'يجب أن يكون المجال على الأقل :min characters.',
    ],
    'min_digits' => 'يجب أن يكون المجال على الأقل :min digits.',
    'missing' => 'يجب أن يكون الحقل مفقودًا.',
    'missing_if' => 'يجب أن يكون الحقل مفقودًا عندما :other is :value.',
    'missing_unless' => 'field must be missing unless :other is :value.',
    'missing_with' => 'يجب أن يكون المجال مفقودًا عندما :values is present.',
    'missing_with_all' => 'يجب أن يكون المجال مفقودًا عندما :values are present.',
    'multiple_of' => 'يجب أن يكون الحقل مضاعفًا :value.',
    'not_in' => 'مختار :attribute is invalid.',
    'not_regex' => 'الشكل الحقلي غير صالح.',
    'numeric' => 'يجب أن يكون المجال عددًا.',
    'password' => [
        'letters' => 'يجب أن يحتوي على حرف واحد على الأقل.',
        'mixed' => 'يجب أن يحتوي الحقل على حقيبة علوية واحدة على الأقل وحرف صغير واحد.',
        'numbers' => 'يجب أن يحتوي على رقم واحد على الأقل.',
        'symbols' => 'يجب أن يحتوي على رمز واحد على الأقل.',
        'uncompromised' => 'المعطى :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'يجب أن يكون الميدان موجودا.',
    'prohibited' => 'مجال محظور.',
    'prohibited_if' => 'الحقل محظور عندما :other is :value.',
    'prohibited_unless' => 'حقل محظور ما لم :other is in :values.',
    'prohibits' => 'حظر ميداني :other from being present.',
    'regex' => 'صيغه الحقل  غير صالحه',
    'required' => 'الحقل مطلوب.',
    'required_array_keys' => 'يجب أن يحتوي على مداخل لـ: :values.',
    'required_if' => 'الحقل عندما يكون مطلوبا :other is :value.',
    'required_if_accepted' => 'الحقل عندما يكون مطلوبا :other is accepted.',
    'required_unless' => 'ما لم يكن مطلوبا :other is in :values.',
    'required_with' => 'الميدان عندما يكون مطلوبا :values is present.',
    'required_with_all' => 'الحقل عندما يكون مطلوبا :values are present.',
    'required_without' => 'الحقل عندما يكون مطلوبا :values is not present.',
    'required_without_all' => 'مطلوب عندما لا يكون أي من :values are present.',
    'same' => 'يجب أن يتطابق الحقل :other.',
    'size' => [
        'array' => 'يجب أن يحتوي على :size items.',
        'file' => 'يجب ان يكون الحقل :size kilobytes.',
        'numeric' => 'يجب ان يكون الحقل :size.',
        'string' => 'يجب ان يكون الحقل :size characters.',
    ],
    'starts_with' => 'يجب أن يبدأ الحقل بواحد مما يلي: :values.',
    'string' => 'يجب أن يكون المجال عبارة عن سلسلة.',
    'timezone' => 'يجب أن يكون المجال منطقة زمنية صالحة.',
    'unique' => 'قد اتخذت بالفعل.',
    'uploaded' => 'فشل في التحميل.',
    'uppercase' => 'يجب أن يكون الحقل أعلى.',
    'url' => 'يجب أن يكون عنوان URL صالحًا.',
    'ulid' => 'يجب أن يكون حقل ULID ساري المفعول.',
    'uuid' => 'يجب أن يكون حقل UUID ساري المفعول.',
    'invalid' => 'الحقل غير صالح',
    'taken' => 'تم أخذ الحقل بالفعل',
    'wrong_credentials' => 'أوراق اعتماد خاطئة',
    'validation_errors' => 'أخطاء التحقق',
    'success' => 'نجاح',
    'error' => 'خطأ',
    'not_found' => 'لم يتم العثور',
    'not_exists' => 'غير موجود',
    'project' => [
        'price' => 'أكبر من سعر المشروع',
        'completed' => 'تم تمرير تاريخ الانتهاء',
    ],
    'quantity' => [
        'bigger' => 'أكبر من الموجود ',
    ],
    'wrong' => 'خاطئ',
    'captcha' => 'غير صالح',
    'inactive' => 'غير نشط',
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
            'rule-name' => 'رسالة العميل',
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
    'not_verified' => 'لم يتم التحقق منها',
    'frozen' => 'تم تجميد الحساب',
];
