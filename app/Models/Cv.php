<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = [
        'vacancy_id',
        'file',
    ];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

        public static function attributes(): array
    {
        return [
            'id'                    => '#',
            'vacancy_id'            => __('translate.Vacancy'),
            'file'                  => __('translate.File'),
            'actions'               => __('translate.Operations'),
        ];
    }

    public static function headerAttributes(): array
    {
        return [
            'id',
            'vacancy_id',
            'file',
            'actions',
        ];
    }
}
