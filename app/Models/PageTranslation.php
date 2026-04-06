<?php

namespace App\Models;

class PageTranslation extends BaseTranslation
{
    protected $table = 'page_translations';
    protected $fillable = [
        'title',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
