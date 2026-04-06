<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\SettingType;

class Setting extends Model
{
    // protected $casts = [
    //     'type' => SettingType::class
    // ];

    protected $fillable = [
        'keyword',
        'value',
        'type'
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
            'keyword' => __('translate.Keyword'),
            'value' => __('translate.Value'),
            'type' => __('translate.Type'),
            'file' => __('translate.File'),
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
            'type',
            'keyword',
            'value',
            'actions',
        ];
    }
}
