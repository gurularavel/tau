<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaGuidePageImage extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'media_guide_page_id',
        'image',
    ];
}
