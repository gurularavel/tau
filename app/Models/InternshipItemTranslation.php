<?php

namespace App\Models;

class InternshipItemTranslation extends BaseTranslation
{
    protected $table = 'internship_item_translations';
    protected $fillable = [
        'internship_item_id',
        'locale',
        'title',
    ];

    public function InternshipItem()
    {
        return $this->belongsTo(InternshipItem::class);
    }
}
