<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryPageInfoTranslation extends BaseTranslation
{
    public $timestamps = false;

    protected $fillable = ['title', 'description'];
}
