<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class InternshipProgramPageItem extends Model
{
    use HasFactory;
    use Translatable;

    public const IS_ACTIVE = 1;

    protected $table = 'internship_program_page_items';
    public array $translatedAttributes = ['title', 'description'];

    protected $fillable = ['order', 'internship_program_page_id', 'is_active'];

    /**
     * Attributes
     *
     * @return array
     */
    public static function attributes(): array
    {
        return [
            'id' => '#',
            'internship_program_page_id' => __('translate.Internship programs page'),
            'title' => __('translate.Title'),
            'description' => __('translate.Description'),
            'order' => __('translate.Sorting'),
            'is_active' => __('translate.Active'),
            'actions' => __('translate.Operations'),
        ];
    }

    public static function headerAttributes(): array
    {
        return ['id', 'title', 'order', 'internship_program_page_id', 'is_active', 'actions'];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', self::IS_ACTIVE)->orderBy('order');
    }
    public function internshipProgramPage()
    {
        return $this->belongsTo(InternshipProgramPage::class);
    }
}
