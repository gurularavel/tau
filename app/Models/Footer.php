<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Footer extends Model
{
    use HasFactory;
    use Translatable;

    public const IS_ACTIVE = 1;


    protected $with = ['items'];

    protected $fillable = [ 'is_active','order'];
    public array $translatedAttributes = ['title'];
    /**
     * Attributes
     *
     * @return array
     */
    public static function attributes(): array
    {
        return [
            'id' => '#',
            'order' => __('translate.Sorting'),
            'is_active' => __('translate.Active'),
            'title' => __('translate.Title'),
            'actions' => __('translate.Operations'),
        ];
    }

    public static function headerAttributes(): array
    {
        return ['id', 'title', 'is_active', 'actions'];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', self::IS_ACTIVE)->latest();
    }
    // public function category()
    // {
    //     return $this->belongsTo(ProjectCategory::class,'project_category_id');
    // }

    public function items()
    {
        return $this->hasMany(FooterItem::class)->orderBy('order');
    }

}
