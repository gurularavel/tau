<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryPageTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title', 'description',
        'subtitle', 'content',
        'stat1_label', 'stat2_label', 'stat3_label', 'stat4_label',
        'meta_title', 'meta_description', 'meta_keywords',
    ];
}
