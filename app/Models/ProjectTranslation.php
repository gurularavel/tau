<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title','author', 'description', 'meta_title', 'meta_keywords', 'meta_description'];


    protected $table = 'project_translations';


}
