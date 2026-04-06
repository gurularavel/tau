<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InternshipProgram extends Model
{
    use HasFactory;
    use Translatable;

    public const IS_ACTIVE = 1;


    protected $with = ['items'];

    protected $fillable = ['duration', 'place_count', 'created_at', 'image', 'is_active', 'slug'];
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
            'image' => __('translate.Image'),
            'slug' => __('translate.Slug'),
            'is_active' => __('translate.Active'),
            'duration' => __('translate.Duration'),
            'place_count' => __('translate.Place count'),
            'title' => __('translate.Title'),
            'description' => __('translate.Description'),
            'meta_title' => __('translate.Meta title'),
            'meta_keywords' => __('translate.Meta keywords'),
            'meta_description' => __('translate.Meta description'),
            'actions' => __('translate.Operations'),
        ];
    }

    public static function headerAttributes(): array
    {
        return ['id', 'image', 'title', 'is_active', 'actions'];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', self::IS_ACTIVE)->latest();
    }
    // public function category()
    // {
    //     return $this->belongsTo(ProjectCategory::class,'project_category_id');
    // }

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('order');
    }

    public function items()
    {
        return $this->hasMany(InternshipItem::class)->orderBy('order');
    }
    public function advantageItems()
    {
        return $this->hasMany(AdvantageItem::class)->orderBy('order');
    }
}
