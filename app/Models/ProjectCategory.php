<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;
    use Translatable;

    protected $table = 'project_categories';
    public const IS_ACTIVE = 1;

    public array $translatedAttributes = ['title', 'meta_title', 'meta_description', 'meta_keywords'];

    protected $fillable = [
        'is_active',
        'slug',
        // 'image'
    ];

    public static function attributes(): array
    {
        return [
            'id' => '#',
            // 'image'                 => __('translate.Image'),
            'is_active' => __('translate.Active'),
            'title' => __('translate.Title'),
            'meta_title' => __('translate.Meta title'),
            'meta_keywords' => __('translate.Meta keywords'),
            'meta_description' => __('translate.Meta description'),
            'actions' => __('translate.Operations'),
        ];
    }

    /**
     * Datatable header attributes
     *
     * @return array
     */
    public static function headerAttributes(): array
    {
        return [
            'id',
            // 'image',
            'title',
            'is_active',
            'actions',
        ];
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', self::IS_ACTIVE)->latest();
    }
}
