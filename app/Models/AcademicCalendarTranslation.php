<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicCalendarTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'subject',

        ];

    protected $table = 'academic_calendar_translations';


}
