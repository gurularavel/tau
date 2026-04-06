<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratoryImage extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'laboratory_id',
        'image',
    ];
}
