<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPage extends Model
{
    use HasFactory, Translatable;

    protected $table = 'history_page';

    protected $fillable = [
        'breadcrumb',
        'image1', 'image2', 'image3', 'image4',
        'stat1_value', 'stat2_value', 'stat3_value', 'stat4_value',
    ];

    public array $translatedAttributes = [
        'title', 'description',
        'subtitle', 'content',
        'stat1_label', 'stat2_label', 'stat3_label', 'stat4_label',
        'meta_title', 'meta_description', 'meta_keywords',
    ];

    public static function attributes(): array
    {
        return [
            'id'               => '#',
            'breadcrumb'       => __('translate.Image'),
            'title'            => __('translate.Title'),
            'description'      => __('translate.Description'),
            'subtitle'         => __('translate.Subtitle'),
            'content'          => __('translate.Content'),
            'stat1_label'      => 'Stat 1 Label',
            'stat2_label'      => 'Stat 2 Label',
            'stat3_label'      => 'Stat 3 Label',
            'stat4_label'      => 'Stat 4 Label',
            'meta_title'       => __('translate.Meta Title'),
            'meta_description' => __('translate.Meta Description'),
            'meta_keywords'    => __('translate.Meta Keywords'),
        ];
    }
}
