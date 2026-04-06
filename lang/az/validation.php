<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Doğrulama (Validation) Mesajları
    |--------------------------------------------------------------------------
    |
    | Bu sətirlər doğrulama sinfi tərəfindən istifadə olunan standart
    | səhv mesajlarını ehtiva edir. Bəzi qaydalar bir neçə versiyada
    | ola bilər, məsələn ölçü qaydaları. Mesajları istəyə uyğun dəyişə bilərsiniz.
    |
    */

    'accepted' => ':attribute qəbul edilməlidir.',
    'accepted_if' => ':other :value olduqda, :attribute qəbul edilməlidir.',
    'active_url' => ':attribute düzgün URL olmalıdır.',
    'after' => ':attribute tarixi :date tarixindən sonra olmalıdır.',
    'after_or_equal' => ':attribute tarixi :date tarixindən sonra və ya bərabər olmalıdır.',
    'alpha' => ':attribute yalnız hərflərdən ibarət olmalıdır.',
    'alpha_dash' => ':attribute yalnız hərf, rəqəm, tire və alt xətt simvolları içərə bilər.',
    'alpha_num' => ':attribute yalnız hərflər və rəqəmlərdən ibarət olmalıdır.',
    'array' => ':attribute massiv formatında olmalıdır.',
    'ascii' => ':attribute yalnız ASCII simvollarından ibarət olmalıdır.',
    'before' => ':attribute tarixi :date tarixindən əvvəl olmalıdır.',
    'before_or_equal' => ':attribute tarixi :date tarixindən əvvəl və ya bərabər olmalıdır.',
    'between' => [
        'array' => ':attribute :min ilə :max element arasında olmalıdır.',
        'file' => ':attribute ölçüsü :min ilə :max kilobayt arasında olmalıdır.',
        'numeric' => ':attribute :min ilə :max arasında olmalıdır.',
        'string' => ':attribute uzunluğu :min ilə :max simvol arasında olmalıdır.',
    ],
    'boolean' => ':attribute dəyəri doğru və ya yalan olmalıdır.',
    'can' => ':attribute icazəsiz dəyər ehtiva edir.',
    'confirmed' => ':attribute təsdiqi uyğun gəlmir.',
    'current_password' => 'Şifrə yanlışdır.',
    'date' => ':attribute düzgün tarix olmalıdır.',
    'date_equals' => ':attribute tarixi :date tarixi ilə eyni olmalıdır.',
    'date_format' => ':attribute formatı :format formatına uyğun olmalıdır.',
    'decimal' => ':attribute :decimal onluq rəqəmlə olmalıdır.',
    'declined' => ':attribute rədd edilməlidir.',
    'declined_if' => ':other :value olduqda, :attribute rədd edilməlidir.',
    'different' => ':attribute və :other fərqli olmalıdır.',
    'digits' => ':attribute :digits rəqəmdən ibarət olmalıdır.',
    'digits_between' => ':attribute :min ilə :max rəqəm arasında olmalıdır.',
    'dimensions' => ':attribute şəkil ölçüləri yanlışdır.',
    'distinct' => ':attribute dəyəri təkrarlanır.',
    'doesnt_end_with' => ':attribute aşağıdakı ilə bitməməlidir: :values.',
    'doesnt_start_with' => ':attribute aşağıdakı ilə başlamamalıdır: :values.',
    'email' => ':attribute düzgün e-poçt ünvanı olmalıdır.',
    'ends_with' => ':attribute aşağıdakı ilə bitməlidir: :values.',
    'enum' => 'Seçilmiş :attribute etibarsızdır.',
    'exists' => 'Seçilmiş :attribute etibarsızdır.',
    'extensions' => ':attribute aşağıdakı uzantılardan biri ilə olmalıdır: :values.',
    'file' => ':attribute fayl olmalıdır.',
    'filled' => ':attribute dəyəri olmalıdır.',
    'gt' => [
        'array' => ':attribute :value elementdən çox olmalıdır.',
        'file' => ':attribute :value kilobaytdan böyük olmalıdır.',
        'numeric' => ':attribute :value-dən böyük olmalıdır.',
        'string' => ':attribute :value simvoldan çox olmalıdır.',
    ],
    'gte' => [
        'array' => ':attribute ən azı :value elementdən ibarət olmalıdır.',
        'file' => ':attribute :value kilobaytdan böyük və ya bərabər olmalıdır.',
        'numeric' => ':attribute :value-dən böyük və ya bərabər olmalıdır.',
        'string' => ':attribute :value simvoldan çox və ya bərabər olmalıdır.',
    ],
    'hex_color' => ':attribute düzgün onaltılıq rəng kodu olmalıdır.',
    'image' => ':attribute şəkil formatında olmalıdır.',
    'in' => 'Seçilmiş :attribute etibarsızdır.',
    'in_array' => ':attribute :other massivində mövcud olmalıdır.',
    'integer' => ':attribute tam ədəd olmalıdır.',
    'ip' => ':attribute düzgün IP ünvanı olmalıdır.',
    'ipv4' => ':attribute düzgün IPv4 ünvanı olmalıdır.',
    'ipv6' => ':attribute düzgün IPv6 ünvanı olmalıdır.',
    'json' => ':attribute düzgün JSON formatında olmalıdır.',
    'lowercase' => ':attribute kiçik hərflərlə yazılmalıdır.',
    'lt' => [
        'array' => ':attribute :value elementdən az olmalıdır.',
        'file' => ':attribute :value kilobaytdan az olmalıdır.',
        'numeric' => ':attribute :value-dən az olmalıdır.',
        'string' => ':attribute :value simvoldan az olmalıdır.',
    ],
    'lte' => [
        'array' => ':attribute :value elementdən çox olmamalıdır.',
        'file' => ':attribute :value kilobaytdan çox olmamalıdır.',
        'numeric' => ':attribute :value-dən çox olmamalıdır.',
        'string' => ':attribute :value simvoldan çox olmamalıdır.',
    ],
    'mac_address' => ':attribute düzgün MAC ünvanı olmalıdır.',
    'max' => [
        'array' => ':attribute :max elementdən çox olmamalıdır.',
        'file' => ':attribute :max kilobaytdan böyük olmamalıdır.',
        'numeric' => ':attribute :max-dan böyük olmamalıdır.',
        'string' => ':attribute :max simvoldan çox olmamalıdır.',
    ],
    'max_digits' => ':attribute :max rəqəmdən çox olmamalıdır.',
    'mimes' => ':attribute aşağıdakı tipdə fayl olmalıdır: :values.',
    'mimetypes' => ':attribute aşağıdakı tipdə fayl olmalıdır: :values.',
    'min' => [
        'array' => ':attribute ən azı :min elementdən ibarət olmalıdır.',
        'file' => ':attribute ən azı :min kilobayt olmalıdır.',
        'numeric' => ':attribute ən azı :min olmalıdır.',
        'string' => ':attribute ən azı :min simvoldan ibarət olmalıdır.',
    ],
    'min_digits' => ':attribute ən azı :min rəqəmdən ibarət olmalıdır.',
    'missing' => ':attribute sahəsi olmalıdır.',
    'missing_if' => ':other :value olduqda, :attribute olmamalıdır.',
    'missing_unless' => ':other :value olmadıqda, :attribute olmamalıdır.',
    'missing_with' => ':values mövcud olduqda, :attribute olmamalıdır.',
    'missing_with_all' => ':values mövcud olduqda, :attribute olmamalıdır.',
    'multiple_of' => ':attribute :value ədədinin çoxluğunda olmalıdır.',
    'not_in' => 'Seçilmiş :attribute etibarsızdır.',
    'not_regex' => ':attribute formatı düzgün deyil.',
    'numeric' => ':attribute ədəd olmalıdır.',
    'password' => [
        'letters' => ':attribute ən azı bir hərf içərməlidir.',
        'mixed' => ':attribute ən azı bir böyük və bir kiçik hərf içərməlidir.',
        'numbers' => ':attribute ən azı bir rəqəm içərməlidir.',
        'symbols' => ':attribute ən azı bir simvol içərməlidir.',
        'uncompromised' => 'Seçilmiş :attribute məlumat sızmasında aşkar olunub. Zəhmət olmasa başqa şifrə seçin.',
    ],
    'present' => ':attribute mövcud olmalıdır.',
    'present_if' => ':other :value olduqda, :attribute mövcud olmalıdır.',
    'present_unless' => ':other :value olmadıqda, :attribute mövcud olmalıdır.',
    'present_with' => ':values mövcud olduqda, :attribute mövcud olmalıdır.',
    'present_with_all' => ':values mövcud olduqda, :attribute mövcud olmalıdır.',
    'prohibited' => ':attribute sahəsi qadağandır.',
    'prohibited_if' => ':other :value olduqda, :attribute sahəsi qadağandır.',
    'prohibited_unless' => ':other :values içərisində olmadıqda, :attribute sahəsi qadağandır.',
    'prohibits' => ':attribute sahəsi :other sahəsinin mövcud olmasına mane olur.',
    'regex' => ':attribute formatı düzgün deyil.',
    'required' => ':attribute * mütləq doldurulmalıdır.',
    'required_array_keys' => ':attribute sahəsi aşağıdakı açarları içərməlidir: :values.',
    'required_if' => ':other :value olduqda, :attribute tələb olunur.',
    'required_if_accepted' => ':other qəbul edildikdə, :attribute tələb olunur.',
    'required_unless' => ':other :values içərisində olmadıqda, :attribute tələb olunur.',
    'required_with' => ':values mövcud olduqda, :attribute tələb olunur.',
    'required_with_all' => ':values mövcud olduqda, :attribute tələb olunur.',
    'required_without' => ':values mövcud olmadıqda, :attribute tələb olunur.',
    'required_without_all' => ':values heç biri mövcud olmadıqda, :attribute tələb olunur.',
    'same' => ':attribute və :other uyğun olmalıdır.',
    'size' => [
        'array' => ':attribute :size elementdən ibarət olmalıdır.',
        'file' => ':attribute :size kilobayt olmalıdır.',
        'numeric' => ':attribute :size olmalıdır.',
        'string' => ':attribute :size simvoldan ibarət olmalıdır.',
    ],
    'starts_with' => ':attribute aşağıdakı ilə başlamalıdır: :values.',
    'string' => ':attribute mətn formatında olmalıdır.',
    'timezone' => ':attribute düzgün saat qurşağı olmalıdır.',
    'unique' => ':attribute artıq istifadə edilib.',
    'uploaded' => ':attribute yüklənmədi.',
    'uppercase' => ':attribute böyük hərflərlə yazılmalıdır.',
    'url' => ':attribute düzgün URL olmalıdır.',
    'ulid' => ':attribute düzgün ULID olmalıdır.',
    'uuid' => ':attribute düzgün UUID olmalıdır.',

    /*
    |--------------------------------------------------------------------------
    | Xüsusi doğrulama mesajları
    |--------------------------------------------------------------------------
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'xüsusi-mesaj',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Xüsusi atribut adları
    |--------------------------------------------------------------------------
    |
    | Burada "email" yerinə "E-poçt ünvanı" kimi daha anlaşılan adlar
    | təyin edə bilərsiniz.
    |
    */

    'attributes' => [],

];
