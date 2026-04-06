<?php

namespace App\Models;

class AdvantageItemTranslation extends BaseTranslation
{
    protected $table = 'advantage_item_translations';
    protected $fillable = [
        'advantage_item_id',
        'locale',
        'title',
    ];

    public function AdvantageItem()
    {
        return $this->belongsTo(AdvantageItem::class);
    }
}
