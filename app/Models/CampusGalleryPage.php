<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CampusGalleryPage extends Model
{
    use Translatable, HasFactory;

    public const IS_ACTIVE = 1;

    protected $table = 'campus_gallery_pages';
    protected $fillable = ['image','image2','image3','image4','image5','video_url'];

    public array $translatedAttributes = ['title','title2', 'description','description2','description3', 'meta_title', 'meta_keywords', 'meta_description'];

    public static function attributes(): array
    {
        return [
            'id' => '#',
            'image' => __('translate.Image'),
                        'image2' => __('translate.Image'),
            'image3' => __('translate.Image'),
            'image4' => __('translate.Image'),
            'image5' => __('translate.Image'),

            'title' => __('translate.Title'),
            'title2' => __('translate.Title'),
            'description' => __('translate.Description'),
            'description2' => __('translate.Description'),
            'description3' => __('translate.Description'),

            'meta_title' => __('translate.Meta title'),
            'meta_keywords' => __('translate.Meta keywords'),
            'meta_description' => __('translate.Meta description'),
            'actions' => __('translate.Operations'),
        ];
    }
}
