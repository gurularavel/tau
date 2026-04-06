<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CareerOpportunity extends Model
{
    use HasFactory;
    use Translatable;

    public const IS_ACTIVE = 1;



    protected $fillable = ['career_opportunity_category_id', 'created_at', 'image', 'is_active', 'slug'];
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
            'career_opportunity_category_id' => __('translate.category'),
            'image' => __('translate.Image'),
            'slug' => __('translate.Slug'),
            'is_active' => __('translate.Active'),
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
    public function category()
    {
        return $this->belongsTo(CareerOpportunityCategory::class, 'career_opportunity_category_id');
    }



}
