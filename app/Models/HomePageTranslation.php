<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'title2',
        'title3',
        'title4',
        'title5',

        'description',
        'description','description2', 'description3', 'description4','description5',
    ];
}
