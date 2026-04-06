<?php

namespace App\Models;

class EventCategoryTranslation extends BaseTranslation
{
    protected $table = 'event_category_translations';

    protected $fillable = [
        'title',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];
}
