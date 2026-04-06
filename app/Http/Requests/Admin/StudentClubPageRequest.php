<?php

namespace App\Http\Requests\Admin;

use App\Models\ProjectPage;
use App\Models\GraduatePage;
use App\Rules\NotEmptyHtml;

class GraduatePageRequest extends TranslatableRequest
{

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
                'image' => ['required', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
            ], $this->translations()),
            self::SCENARIO_UPDATE => array_merge([
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
            ], $this->translations()),
            default => [
                'id' => 'integer|nullable',
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
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
        $model = new GraduatePage();
        return $this->translatedAttributes($model);
    }


    private function translations(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["title:$locale"]                     = ['required', 'string'];
            $rules["description:$locale"]               = ['nullable', 'string'];
            $rules["meta_title:$locale"]                = ['nullable', 'string'];
            $rules["meta_keywords:$locale"]             = ['nullable', 'string'];
            $rules["meta_description:$locale"]          = ['nullable', 'string'];
        }
        return $rules;
    }
}
