<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class FooterItem extends Model
{
    use HasFactory;
    use Translatable;

    public const IS_ACTIVE = 1;

    protected $table = 'footer_items';
    public array $translatedAttributes = ['title'];

    protected $fillable = ['order', 'footer_id', 'slug', 'is_active'];

    /**
     * Attributes
     *
     * @return array
     */
    public static function attributes(): array
    {
        return [
            'id' => '#',
            'footer_id' => __('translate.Footer'),
            'title' => __('translate.Title'),
            'order' => __('translate.Sorting'),
            'is_active' => __('translate.Active'),
            'slug' => __('translate.Slug'),
            'actions' => __('translate.Operations'),
        ];
    }

    public static function headerAttributes(): array
    {
        return ['id', 'title', 'order', 'footer_id', 'is_active', 'actions'];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', self::IS_ACTIVE)->orderBy('order');
    }
    public function footer()
    {
        return $this->belongsTo(Footer::class);
    }
}
