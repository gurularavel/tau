<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class DynamicItem extends Model
{
    use HasFactory;
    use Translatable;

    public const IS_ACTIVE = 1;

    protected $table = 'dynamic_items';
    public array $translatedAttributes = ['title','description','name','profession','email','phone'];

    protected $fillable = ['order', 'dynamic_id', 'image','type', 'is_active'];

    /**
     * Attributes
     *
     * @return array
     */
    public static function attributes(): array
    {
        return [
            'id' => '#',
            'dynamic_id' => __('translate.About'),
            'title' => __('translate.Title'),
            'description' => __('translate.Title'),
            'type' => __('translate.Type'),
            'email' => __('translate.Email'),
            'phone' => __('translate.Phone'),
            'profession' => __('translate.Profession'),
            'name' => __('translate.Name'),

            'order' => __('translate.Sorting'),
            'is_active' => __('translate.Active'),
            'actions' => __('translate.Operations'),
        ];
    }

    public static function headerAttributes(): array
    {
        return ['id', 'title','type', 'order', 'dynamic_id', 'is_active', 'actions'];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', self::IS_ACTIVE)->orderBy('order');
    }
    public function dynamic()
    {
        return $this->belongsTo(Dynamic::class);
    }


}
