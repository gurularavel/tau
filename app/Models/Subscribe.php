<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table = 'subscribes';

    protected $guarded = [];

        /**
     * Attributes
     *
     * @return array
     */
    public static function attributes(): array
    {
        return [
            'id' => '#',
            'email' =>  __('translate.Email'),
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
            'email',
            'actions',
        ];
    }
}
