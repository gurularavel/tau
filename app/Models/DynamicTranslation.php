<?php

namespace App\Models;

class DynamicTranslation extends BaseTranslation
{
    protected $table = 'dynamic_translations';
    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
