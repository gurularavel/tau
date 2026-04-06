<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class ProgramDynamicItem extends Model
{
    use HasFactory;
    use Translatable;

    public const IS_ACTIVE = 1;
    protected $casts = [
            'deadline' => 'datetime',
            'created_at' => 'datetime',

    ];
    protected $table = 'program_dynamic_items';
    public array $translatedAttributes = ['title','subtitle','description','name','profession', 'education_type','subject_name','examine_type',
        'day',
        'professor'];

    protected $fillable = ['order', 'dynamic_id', 'image','type', 'is_active','deadline','created_at','phone','credit','code','hour','room','url'];

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
            'code' => __('translate.Code'),
            'credit' => __('translate.Credit'),
            'education_type' => __('translate.Education type'),

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
        return $this->belongsTo(ProgramDynamic::class);
    }


}
