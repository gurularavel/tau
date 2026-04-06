<?php

namespace App\Http\Requests\Admin;

use App\Models\AcademicCalendar;

class AcademicCalendarRequest extends TranslatableRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return match ($this->scenario) {

            self::SCENARIO_INSERT => array_merge(
                [
                    'academic_year' => ['nullable', 'string'],
                    'semester_id' => ['nullable', 'exists:semesters,id'],
                    'education_level_id' => ['nullable', 'exists:education_levels,id'],
                    'faculty_id' => ['nullable', 'exists:faculties,id'],
                    'education_type_id' => ['nullable', 'exists:education_types,id'],
                    'event_type_id' => ['nullable', 'exists:event_types,id'],
                    'event_date' => ['required', 'date'],
                    'order' => ['nullable', 'integer'],
                    'is_active' => ['nullable', 'boolean'],
                ],
                $this->translations()
            ),

            self::SCENARIO_UPDATE => array_merge(
                [
                    'academic_year' => ['nullable', 'string'],
                    'semester_id' => ['nullable', 'exists:semesters,id'],
                    'education_level_id' => ['nullable', 'exists:education_levels,id'],
                    'faculty_id' => ['nullable', 'exists:faculties,id'],
                    'education_type_id' => ['nullable', 'exists:education_types,id'],
                    'event_type_id' => ['nullable', 'exists:event_types,id'],
                    'event_date' => ['required', 'date'],
                    'order' => ['nullable', 'integer'],
                    'is_active' => ['required', 'boolean'],
                ],
                $this->translations()
            ),

            default => [],
        };
    }

    public function attributes(): array
    {
        $model = new AcademicCalendar();
        return $this->translatedAttributes($model);
    }

    private function translations(): array
    {
        $rules = [];

        foreach ($this->locales() as $locale) {
            $rules["subject:$locale"] = ['required', 'string'];
        }

        return $rules;
    }
}
