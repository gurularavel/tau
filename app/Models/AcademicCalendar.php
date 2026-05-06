<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicCalendar extends Model
{
    use HasFactory, Translatable;

    public const IS_ACTIVE = 1;

    // 🔥 yalnız subject qalır
    public array $translatedAttributes = ['subject', 'content'];


    protected $fillable = [
        'is_active',
        'academic_year',
        'semester_id',
        'education_level_id',
        'faculty_id',
        'education_type_id',
        'event_type_id',
        'event_date',
        'order',
    ];

    // 🔥 Scope
    public function scopeActive($query)
    {
        return $query->where('is_active', self::IS_ACTIVE);
    }

    // 🔥 Relations
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function educationType()
    {
        return $this->belongsTo(EducationType::class);
    }

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    // 🔥 Admin table üçün
public static function attributes(): array
{
    return [
        'id' => '#',
        'subject' => __('translate.Subject'),
        'content' => __('translate.Content'),
        'academic_year' => __('translate.Academic Year'),
        'semester' => __('translate.Semester'),
        'education_level' => __('translate.Education Level'),
        'faculty' => __('translate.Faculty'),
        'education_type' => __('translate.Education Type'),
        'event_type' => __('translate.Event Type'),
        'event_date' => __('translate.Event Date'),
        'order' => __('translate.Order'),
        'is_active' => __('translate.Status'),
        'actions' => __('translate.Operations'),
        'remaining_days' => __('translate.Remaining days')
    ];
}

 public static function headerAttributes(): array
{
    return ['id', 'subject', 'academic_year', 'event_date', 'remaining_days', 'is_active', 'actions'];
}

public function getRemainingDaysAttribute(): int
{
    return now()->diffInDays($this->event_date, false);
}
}
