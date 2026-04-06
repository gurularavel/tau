<?php

namespace App\Models;

class DynamicItemTranslation extends BaseTranslation
{
    protected $table = 'dynamic_item_translations';
    protected $fillable = [
        'dynamic_item_id',
        'locale',
        'description',
        'image',
        'title',
        'name',
        'profession',
        'phone',
        'email',
        'subtitle',
        'code',
        'credit',
        'education_type',
        'subject_name',
        'examine_type',
        'room',
        'hour',
        'day',
        'professor',
    ];

    public function dynamicItem()
    {
        return $this->belongsTo(DynamicItem::class);
    }
}
