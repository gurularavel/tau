<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicImage extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'dynamic_id',
        'image',
    ];
}
