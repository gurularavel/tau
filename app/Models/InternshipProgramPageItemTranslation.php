<?php

namespace App\Models;

class InternshipProgramPageItemTranslation extends BaseTranslation
{
    protected $table = 'internship_program_page_item_translations';
    protected $fillable = [
        'internship_program_page_item_id',
        'locale',
        'title',
        'description',
    ];

    public function InternshipProgarmPageItem()
    {
        return $this->belongsTo(InternshipProgramPageItem::class);
    }
}
