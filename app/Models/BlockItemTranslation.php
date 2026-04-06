<?php

namespace App\Models;

class BlockItemTranslation extends BaseTranslation
{
    protected $table = 'block_item_translations';
    protected $fillable = [
        'block_item_id',
        'locale',
        'description',
        'image',
        'title',
    ];

    public function blockItem()
    {
        return $this->belongsTo(BlockItem::class);
    }
}
