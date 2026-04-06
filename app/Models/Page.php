<?php

namespace App\Models;

use App\Http\Resources\DynamicResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Page extends Model
{
    use HasFactory;
    use Translatable;

    public const IS_ACTIVE = 1;
    protected $casts = [
        'dynamic_ids' => 'array',
    ];
   protected $table = 'pages';
    public array $translatedAttributes = [
        'title',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $fillable = [
        'slug',
        'is_active',
        'image'
    ];

        /**
     * Attributes
     *
     * @return array
     */
    public static function attributes(): array
    {
        return [
            'id'                    => '#',
            'image'                 => __('translate.Image'),
            'slug'                  => __('translate.URL'),
            'title'                 => __('translate.Title'),
            'content'               => __('translate.Content'),
            'meta_title'            => __('translate.Meta Title'),
            'meta_description'      => __('translate.Meta Description'),
            'meta_keywords'         => __('translate.Meta Keywords'),
            'is_active'             => __('translate.Active'),
            'actions'               => __('translate.Operations'),
        ];
    }

    public static function headerAttributes(): array
    {
        return [
            'id',
            'title',
            'slug',
            'is_active',
            'actions',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', self::IS_ACTIVE);
    }

public function getDynamicsAttribute()
{
    $dynamicIds = $this->dynamic_ids ?? [];

    if (empty($dynamicIds)) {
        return [];
    }

    $dynamics = Dynamic::with(['translations', 'images', 'items.translations'])
        ->whereIn('id', $dynamicIds)
        ->orderByRaw('FIELD(id, ' . implode(',', $dynamicIds) . ')')
        ->get();

    return DynamicResource::collection($dynamics)->resolve();
}
public function dynamics()
{
    if (!$this->dynamic_ids || !is_array($this->dynamic_ids)) {
        return collect(); // Boş collection
    }

    return \App\Models\Dynamic::whereIn('id', $this->dynamic_ids)
        ->where('is_active', 1)
        ->orderBy('layout_row')
        ->orderBy('layout_column')
        ->orderBy('order')
        ->get(); // Collection qaytarır
}


}
