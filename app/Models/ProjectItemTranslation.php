<?php

namespace App\Models;

class ProjectItemTranslation extends BaseTranslation
{
    protected $table = 'project_item_translations';
    protected $fillable = [
        'project_item_id',
        'locale',
        'title',
    ];

    public function ProjectItem()
    {
        return $this->belongsTo(ProjectItem::class);
    }
}
