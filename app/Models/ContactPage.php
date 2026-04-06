<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactPage extends Model
{
    use Translatable, HasFactory;

    public const IS_ACTIVE = 1;

    protected $table = 'contact_page';

    protected $fillable = ['phone', 'email', 'youtube', 'x_social_media', 'facebook', 'instagram', 'linkedin', 'location_url'];
    public array $translatedAttributes = ['title', 'title2', 'title3', 'description', 'address', 'opening_hour', 'footer', 'meta_title', 'meta_keywords', 'meta_description'];

    public static function attributes(): array
    {
        return [
            'id' => '#',
            'phone' => '',
            'address' => '',
            'email' => '',
            'youtube' => '',
            'x_social_media' => '',
            'facebook' => '',
            'instagram' => '',
            'linkedin' => '',
            'title' => '',
            'title2' => '',
            'title3' => '',
            'description' => '',
            'footer' => '',
            'opening_hour' => '',
            'meta_title' => __('translate.Meta title'),
            'meta_keywords' => __('translate.Meta keywords'),
            'meta_description' => __('translate.Meta description'),
            'actions' => __('translate.Operations'),
        ];
    }
}
