<?php

namespace App\Models;

class ProgramTranslation extends BaseTranslation
{
    protected $table = 'program_translations';
    protected $fillable = [
        'title',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
