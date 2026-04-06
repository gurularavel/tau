<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    const IS_ACTIVE  = 1;
    public const IS_MAIN = 1;



    protected $fillable = [
        'name',
        'locale',
        'is_main',
        'is_active',
    ];

      /**
     * Attributes
     *
     * @return array
     */
    public static function attributes(): array
    {
        return [
            'id' => '#',
            'name' => __('translate.Name'),
            'locale' => __('translate.Code'),
            'is_main' => __('translate.Main'),
            'is_active' => __('translate.Active'),
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
            'name',
            'locale',
            'is_main',
            'is_active',
            'actions',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', self::IS_ACTIVE);
    }

}
