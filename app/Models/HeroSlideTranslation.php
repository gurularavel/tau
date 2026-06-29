<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlideTranslation extends BaseTranslation
{
    public $timestamps = false;
    protected $fillable = ['title', 'description', 'button_text', 'button_url'];
}
