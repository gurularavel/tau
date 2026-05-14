<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLifeClubTranslation extends Model
{

    protected $table = 'student_life_club_translations';

    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
}
