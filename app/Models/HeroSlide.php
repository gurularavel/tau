<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    use HasFactory, Translatable;

    protected $fillable = ['image', 'order', 'is_active'];

    public array $translatedAttributes = ['title', 'description', 'button_text', 'button_url'];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1)->orderBy('order');
    }
}
