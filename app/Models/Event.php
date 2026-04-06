<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    use Translatable;

    public const IS_ACTIVE = 1;

    protected $casts = [
        'partners' => 'array',
    ];

    protected $fillable = ['event_category_id', 'created_at', 'image', 'is_active', 'slug'];
    public array $translatedAttributes = ['title', 'description', 'meta_title', 'meta_keywords', 'meta_description'];
    /**
     * Attributes
     *
     * @return array
     */
    public static function attributes(): array
    {
        return [
            'id' => '#',
            'event_category_id' => __('translate.category'),
            'image' => __('translate.Image'),
            'slug' => __('translate.Slug'),
            'is_active' => __('translate.Active'),
            'title' => __('translate.Title'),
            'description' => __('translate.Description'),
            'meta_title' => __('translate.Meta title'),
            'meta_keywords' => __('translate.Meta keywords'),
            'meta_description' => __('translate.Meta description'),
            'images' => __('translate.Images'),
            'created_at' => __('translate.Published date'),

            'actions' => __('translate.Operations'),
        ];
    }

    public static function headerAttributes(): array
    {
        return ['id', 'image', 'title','created_at', 'is_active', 'actions'];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', self::IS_ACTIVE)->latest();
    }
    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    public function images()
    {
        return $this->hasMany(EventImage::class)->orderBy('order');
    }

}
