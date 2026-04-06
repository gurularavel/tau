<?php

namespace App\Http\Requests\Admin;

use App\Models\Vacancy;
use App\Rules\NotEmptyHtml;

class VacancyRequest extends TranslatableRequest
{
    protected ?string $sortBy = '-published_at';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return match ($this->scenario) {
            self::SCENARIO_INSERT => array_merge([
                'deadline'     => ['nullable', 'date'],
                'published_at' => ['nullable', 'date'],
                'is_active'    => ['required', 'boolean'],
            ], $this->translations()),

            self::SCENARIO_UPDATE => array_merge([
                'deadline'     => ['nullable', 'date'],
                'published_at' => ['nullable', 'date'],
                'is_active'    => ['required', 'boolean'],
            ], $this->translations()),

            default => [
                'id'           => ['nullable', 'integer'],
                'deadline'     => ['nullable', 'date'],
                'published_at' => ['nullable', 'date'],
                'is_active'    => ['nullable', 'boolean'],
            ],
        };
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        $model = new Vacancy();
        $attributes = $this->translatedAttributes($model);

        // Modelin birbaşa özündə olan (tərcüməsiz) sahələr üçün
        $attributes['deadline']     = __('translate.Deadline');
        $attributes['published_at'] = __('translate.Published');
        $attributes['is_active']    = __('translate.Active');
        $attributes['delete_images'] = 'Silinəcək şəkillər';

        return $attributes;
    }

    /**
     * Tərcümə olunan sahələr üçün qaydalar
     */
    private function translations(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["title:$locale"]            = ['nullable', 'string', 'max:255'];
            $rules["status_text:$locale"]      = ['nullable', 'string', 'max:255']; // Yeni əlavə olundu
            $rules["description:$locale"]      = ['nullable', 'string'];
            $rules["content:$locale"]          = ['nullable', 'string'];
            $rules["meta_title:$locale"]       = ['nullable', 'string', 'max:255'];
            $rules["meta_description:$locale"] = ['nullable', 'string', 'max:500'];
            $rules["meta_keywords:$locale"]    = ['nullable', 'string', 'max:255'];
        }
        return $rules;
    }
}
