<?php

namespace App\Models;

class VacancyTranslation extends BaseTranslation
{
    protected $table = 'vacancy_translations';
    protected $fillable = [
        'title',
        'description',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
