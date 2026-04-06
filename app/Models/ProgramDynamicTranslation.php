<?php

namespace App\Models;

class ProgramDynamicTranslation extends BaseTranslation
{
    protected $table = 'program_dynamic_translations';
    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
