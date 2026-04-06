<?php

namespace App\Models;

class ContainerItemTranslation extends BaseTranslation
{
    protected $table = 'container_item_translations';
    protected $fillable = [
        'container_item_id',
        'locale',
        'description',
        'image',
        'title',
    ];

    public function ContainerItem()
    {
        return $this->belongsTo(ContainerItem::class);
    }
}
