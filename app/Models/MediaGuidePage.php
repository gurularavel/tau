<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MediaGuidePage extends Model
{
    use Translatable, HasFactory;

    public const IS_ACTIVE = 1;

    protected $table = 'media_guide_pages';
    protected $fillable = ['image', 'image2', 'image3'];

    public array $translatedAttributes = ['title', 'description', 'meta_title', 'meta_keywords', 'meta_description'];

    public static function attributes(): array
    {
        return [
            'id' => '#',
            'image' => __('translate.Image'),
            'image2' => __('translate.Image'),
            'image3' => __('translate.Image'),

            'title' => __('translate.Title'),
            'description' => __('translate.Description'),
            'images' => __('translate.Images'),

            'meta_title' => __('translate.Meta title'),
            'meta_keywords' => __('translate.Meta keywords'),
            'meta_description' => __('translate.Meta description'),
            'actions' => __('translate.Operations'),
        ];
    }

        public function images()
    {
        return $this->hasMany(MediaGuidePageImage::class)->orderBy('order');
    }
}
