<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Menu extends Model
{
    use HasFactory;
    use Translatable;

    public const IS_ACTIVE = 1;

    protected $table = 'menus';
    public array $translatedAttributes = ['title'];

protected $fillable = [
    'parent_id',
    'type',
    'slug',
    'image',
    'order',
    'is_active'
];

    /**
     * Attributes
     *
     * @return array
     */
    public static function attributes(): array
    {
        return [
            'id' => '#',
            'image' => __('translate.Image'),
            'slug' => __('translate.URL'),
            'title' => __('translate.Title'),
            'order' => __('translate.Sorting'),
            'is_active' => __('translate.Active'),
            'actions' => __('translate.Operations'),
        ];
    }

    public static function headerAttributes(): array
    {
        return ['id', 'title', 'order', 'is_active', 'actions'];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', self::IS_ACTIVE)->orderBy('order');
    }

public function children()
{
    return $this->hasMany(Menu::class, 'parent_id')->orderBy('order');
}


public function parent() {
    return $this->belongsTo(Menu::class, 'parent_id');
}
}
