<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationLevelTranslation extends BaseTranslation
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name'];


    protected $table = 'education_level_translations';


}
