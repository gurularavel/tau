<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyTranslation extends BaseTranslation
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name'];


    protected $table = 'faculty_translations';


}
