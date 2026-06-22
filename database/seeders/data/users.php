<?php

// Susmaya (default) görə zəif parol təhlükəsizlik riskidir (audit tapıntısı).
// Güclü default + .env vasitəsilə override imkanı. Deploy-dan SONRA mütləq dəyişdirin.
return [
    [
        'name' => 'Admin',
        'email' => env('SEED_ADMIN_EMAIL', 'admin@kvadrat.az'),
        'password' => env('SEED_ADMIN_PASSWORD', 'Ch4ngeMe!Kvadrat#2026'),
        'role_id' => 1,
    ]
];
