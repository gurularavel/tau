<?php

namespace App\Models;

class CareerOpportunityCategoryTranslation extends BaseTranslation
{
    protected $table = 'career_opportunity_category_translations';

    protected $fillable = [
        'title',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];
}
