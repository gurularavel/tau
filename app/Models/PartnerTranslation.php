<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerTranslation extends Model
{

    protected $table = 'partner_translations';

    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'title2',
        'intership_location',
        'address',
        'description',
    ];
}
