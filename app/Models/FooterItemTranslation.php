<?php

namespace App\Models;

class FooterItemTranslation extends BaseTranslation
{
    protected $table = 'footer_item_translations';
    protected $fillable = [
        'footer_item_id',
        'locale',
        'title',
    ];

    public function FooterItem()
    {
        return $this->belongsTo(FooterItem::class);
    }
}
