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
                    'is_active' => ['nullable', 'boolean'],
                    'order'     => ['nullable', 'integer'],
                ],
                $this->translations()
            ),

            self::SCENARIO_UPDATE => array_merge(
                [
                    'is_active' => ['required', 'boolean'],
                    'order'     => ['nullable', 'integer'],
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
            $rules["subject:$locale"] = ['nullable', 'string'];
            $rules["content:$locale"] = ['nullable', 'string'];
        }

        return $rules;
    }
}
