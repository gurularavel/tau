<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusGalleryPageTranslation extends Model
{

    protected $table = 'campus_gallery_page_translations';

    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'title2',
        'description',
        'description2',
        'description3',

        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
}
