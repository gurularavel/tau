<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPageTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'title2',
        'title3',
        'description',
        'address',
        'opening_hour',
        'footer',
        'meta_title', 'meta_keywords', 'meta_description'
    ];
}
