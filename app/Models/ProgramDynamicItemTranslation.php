<?php

namespace App\Models;

class ProgramDynamicItemTranslation extends BaseTranslation
{
    protected $table = 'program_dynamic_item_translations';
    protected $fillable = [
        'program_dynamic_item_id',
        'locale',
        'description',
        'image',
        'title',
        'name',
        'profession',
        'subject_name',
        'education_type',
        'examine_type',
        'day',
        'professor',
        'subtitle'
    ];

    public function dynamicItem()
    {
        return $this->belongsTo(ProgramDynamicItem::class);
    }
}
