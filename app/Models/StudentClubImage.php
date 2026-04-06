<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClubImage extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'student_club_id',
        'image',
    ];
}
