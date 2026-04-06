<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class ProjectItem extends Model
{
    use HasFactory;
    use Translatable;

    public const IS_ACTIVE = 1;

    protected $table = 'project_items';
    public array $translatedAttributes = ['title'];

    protected $fillable = ['order', 'project_id', 'image', 'is_active'];

    /**
     * Attributes
     *
     * @return array
     */
    public static function attributes(): array
    {
        return [
            'id' => '#',
            'project_id' => __('translate.Project'),
            'title' => __('translate.Title'),
            'order' => __('translate.Sorting'),
            'is_active' => __('translate.Active'),
            'actions' => __('translate.Operations'),
        ];
    }

    public static function headerAttributes(): array
    {
        return ['id', 'title', 'order', 'project_id', 'is_active', 'actions'];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', self::IS_ACTIVE)->orderBy('order');
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
