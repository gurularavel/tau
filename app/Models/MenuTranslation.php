<?php

namespace App\Models;

class MenuTranslation extends BaseTranslation
{
    protected $table = 'menu_translations';
    protected $fillable = [
        'title',
    ];
}
