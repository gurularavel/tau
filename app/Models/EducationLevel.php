<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    use Translatable, HasFactory;
  public $timestamps = false;
      protected $guarded = [];
    public array $translatedAttributes = ['name'];
}
