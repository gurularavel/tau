<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Vacancy extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public const IS_ACTIVE = 1;

    protected $table = 'vacancies';

    // Tərcümə olunacaq sahələr (Statusu bura əlavə etdik ki, 'Tam ştat'/'Full-time' dildən asılı olsun)
    public array $translatedAttributes = [
        'title',
        'description',
        'content',
        'status_text', // Yeni: İş rejimi (məs: Yarım ştat)
        'meta_title',
        'meta_keywords',
        'meta_description'
    ];

    // Baza cədvəlində birbaşa saxlanılan sahələr
    protected $fillable = [
        'is_active',
        'view_counts',
        'slug',
        'published_at',
        'deadline', // Yeni: Son müraciət tarixi
    ];

    // Tarixləri Carbon obyekti kimi istifadə etmək üçün
    protected $casts = [
        'published_at' => 'datetime',
        'deadline'     => 'date',
        'is_active'    => 'integer',
    ];

    /**
     * Admin panel və ümumi atribut adları
     */
    public static function attributes(): array
    {
        return [
            'id'                => '#',
            'title'             => __('translate.Title'),
            'status_text'       => __('translate.Job Status'), // Yeni
            'deadline'          => __('translate.Deadline'),   // Yeni
            'description'       => __('translate.Description'),
            'content'           => __('translate.Content'),
            'view_counts'       => __('translate.View count'),
            'is_active'         => __('translate.Active'),
            'meta_title'        => __('translate.Meta title'),
            'meta_keywords'     => __('translate.Meta keywords'),
            'meta_description'  => __('translate.Meta description'),
            'published_at'      => __('translate.Published'),
            'actions'           => __('translate.Operations'),
        ];
    }

    /**
     * Cədvəl başlıqları üçün (Header)
     */
    public static function headerAttributes(): array
    {
        return [
            'id',
            'title',
            'status_text', // Yeni: Cədvəldə görünsün
            'deadline',    // Yeni: Cədvəldə görünsün
            'view_counts',
            'published_at',
            'is_active',
            'actions',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', self::IS_ACTIVE)->latest();
    }

    public function cvs()
    {
        return $this->hasMany(Cv::class);
    }
}
