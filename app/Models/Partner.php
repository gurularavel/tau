<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Partner extends Model
{
    use HasFactory;
    use Translatable;

    public const IS_ACTIVE = 1;

    protected $fillable = [
        'image',
        'is_active',
    ];
    public array $translatedAttributes = [
        'title',
        'title2',
        'description',
        'address',
        'intership_location'

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
            'title'                 => __('translate.Title'),
            'title2'                 => __('translate.Title'),
            'description'                 => __('translate.Description'),
            'address'                 => __('translate.Address'),
            'intership_location'                 => __('translate.Intership location'),
            'image'                 => __('translate.Image'),
            'is_active'             => __('translate.Active'),
            'actions'               => __('translate.Operations'),
        ];
    }

    public static function headerAttributes(): array
    {
        return [
            'id',
            'title',
            'image',
            'is_active',
            'actions',
        ];
    }


    public function scopeActive($query)
    {
        return $query->where('is_active', self::IS_ACTIVE)->latest();
    }
}
