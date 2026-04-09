<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPageInfo extends Model
{
    use HasFactory, Translatable;

    protected $table = 'history_page_infos';

    protected $fillable = ['icon', 'order'];

    public array $translatedAttributes = ['title', 'description'];
}
