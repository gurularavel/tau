<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Faculty extends Model
{
      use Translatable, HasFactory;

        public $timestamps = false;
      protected $guarded = [];
    public array $translatedAttributes = ['name'];
}
