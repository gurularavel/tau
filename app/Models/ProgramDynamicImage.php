<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramDynamicImage extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'program_dynamic_id',
        'image',
    ];
}
