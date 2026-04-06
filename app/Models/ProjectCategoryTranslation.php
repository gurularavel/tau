<?php

namespace App\Models;

class ProjectCategoryTranslation extends BaseTranslation
{
    protected $table = 'project_category_translations';

    protected $fillable = [
        'title',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];
}
