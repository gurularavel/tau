<?php

namespace App\Models;

use App\Http\Resources\DynamicResource;
use App\Http\Resources\ProgramDynamicResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Program extends Model
{
    use HasFactory;
    use Translatable;

    public const IS_ACTIVE = 1;
    protected $casts = [
        'program_dynamic_ids' => 'array',
        'program_ids' => 'array'
    ];
   protected $table = 'programs';
    public array $translatedAttributes = [
        'title',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $fillable = [
        'slug',
        'type',
        'program_ids',
        'is_active',
        'image',
        'image2'
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
            'type'                  => __('translate.Type'),
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
    $dynamicIds = $this->program_dynamic_ids ?? [];

    if (empty($dynamicIds)) {
        return [];
    }

    $dynamics = ProgramDynamic::with(['translations', 'images', 'items.translations'])
        ->whereIn('id', $dynamicIds)
        ->orderByRaw('FIELD(id, ' . implode(',', $dynamicIds) . ')')
        ->get();

    return ProgramDynamicResource::collection($dynamics)->resolve();
}
public function dynamics()
{
    if (!$this->program_dynamic_ids || !is_array($this->program_dynamic_ids)) {
        return collect(); // Boş collection
    }

    return \App\Models\ProgramDynamic::whereIn('id', $this->program_dynamic_ids)
        ->where('is_active', 1)
        ->orderBy('layout_row')
        ->orderBy('layout_column')
        ->orderBy('order')
        ->get(); // Collection qaytarır
}


public function getProgramsListAttribute()
{
    if (!$this->program_ids || !is_array($this->program_ids)) {
        return collect();
    }

    return \App\Models\Program::whereIn('id', $this->program_ids)
        ->where('is_active', 1)
        ->orderByRaw('FIELD(id, ' . implode(',', array_map('intval', $this->program_ids)) . ')')
        ->get();
}
}
