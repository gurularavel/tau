<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected array $dates = ['read_at'];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'text',
        'read_at',
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
            'name'                  => __('translate.Name'),
            'email'                 => __('translate.Email'),
            'phone'                 => __('translate.Phone'),
            'text'                  => __('translate.content'),
            'read_at'               => __('translate.Reading date'),
            'actions'               => __('translate.Operations'),
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
            'email',
            'phone',
            'read_at',
            'actions',
        ];
    }
}
