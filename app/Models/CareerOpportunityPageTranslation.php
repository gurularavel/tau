<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerOpportunityPageTranslation extends Model
{

    protected $table = 'career_opportunity_page_translations';

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
