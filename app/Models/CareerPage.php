<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CareerPage extends Model
{
    use Translatable, HasFactory;

    public const IS_ACTIVE = 1;

    protected $table = 'career_pages';
    protected $fillable = ['image'];

    public array $translatedAttributes = ['title', 'description', 'meta_title', 'meta_keywords', 'meta_description'];

    public static function attributes(): array
    {
        return [
            'id' => '#',
            'image' => __('translate.Image'),
            'title' => __('translate.Title'),
            'description' => __('translate.Description'),
            'meta_title' => __('translate.Meta title'),
            'meta_keywords' => __('translate.Meta keywords'),
            'meta_description' => __('translate.Meta description'),
            'actions' => __('translate.Operations'),
        ];
    }
}
