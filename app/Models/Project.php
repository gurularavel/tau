<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;
    use Translatable;

    public const IS_ACTIVE = 1;

    protected $casts = [
        'partners' => 'array',
    ];

    protected $fillable = ['partners', 'project_category_id', 'duration', 'publisher_count', 'participant_count', 'created_at', 'image', 'is_active', 'slug'];
    public array $translatedAttributes = ['title', 'author', 'description', 'meta_title', 'meta_keywords', 'meta_description'];
    /**
     * Attributes
     *
     * @return array
     */
    public static function attributes(): array
    {
        return [
            'id' => '#',
            'project_category_id' => __('translate.category'),
            'image' => __('translate.Image'),
            'slug' => __('translate.Slug'),
            'is_active' => __('translate.Active'),
            'partners' => __('translate.Partners'),
            'author' => __('translate.Author'),
            'duration' => __('translate.Duration'),
            'publisher_count' => __('translate.Publisher count'),
            'participant_count' => __('translate.Participant count'),
            'title' => __('translate.Title'),
            'description' => __('translate.Description'),
            'meta_title' => __('translate.Meta title'),
            'meta_keywords' => __('translate.Meta keywords'),
            'meta_description' => __('translate.Meta description'),
            'images' => __('translate.Images'),

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
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('order');
    }

    public function Items()
    {
        return $this->hasMany(ProjectItem::class)->orderBy('order');
    }
}
