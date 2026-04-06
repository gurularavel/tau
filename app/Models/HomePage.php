<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomePage extends Model
{
    use Translatable, HasFactory;

    public const IS_ACTIVE = 1;

    protected $table = 'home_page';

    protected $guarded = [];
    protected $fillable = ['image', 'image2', 'image3', 'student', 'course', 'language', 'startup', 'teacher'];
    public array $translatedAttributes = ['title', 'title2', 'title3', 'title4','title5', 'description','description2', 'description3', 'description4','description5', 'meta_title', 'meta_keywords', 'meta_description'];

    public static function attributes(): array
    {
        return [
            'id' => '#',
            'image' => __('translate.Image'),
            'image2' => __('translate.Image'),
            'image3' => __('translate.Image'),
            'title' => __('translate.Title'),
            'title2' => __('translate.Title'),
            'title3' => __('translate.Title'),
            'title4' => __('translate.Title'),
            'title5' => __('translate.Title'),
            'description' => __('translate.Description'),
            'description2' => __('translate.Description'),
            'description3' => __('translate.Description'),
            'description4' => __('translate.Description'),
            'description5' => __('translate.Description'),
            'meta_title' => __('translate.Meta title'),
            'meta_keywords' => __('translate.Meta keywords'),
            'meta_description' => __('translate.Meta description'),
            'actions' => __('translate.Operations'),
        ];
    }
}
