<?php

namespace App\Http\Requests\Admin;

use App\Models\Program;
use App\Rules\NotEmptyHtml;

class ProgramRequest extends TranslatableRequest
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
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'image2' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'type' => ['nullable', 'boolean'],
                'program_ids' => ['array', 'nullable']
            ], $this->translations()),
            self::SCENARIO_UPDATE => array_merge([
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'image2' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'is_active' => ['nullable', 'boolean'],
                'type' => ['nullable', 'boolean'],
                'program_ids' => ['array', 'nullable']
            ], $this->translations()),
            default => [
                'id' => 'integer|nullable',
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'image2' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'is_active' => ['nullable', 'boolean'],
                'type' => ['nullable', 'boolean'],
                'program_ids' => ['array', 'nullable']

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
        $model = new Program();
        $attributes = $this->translatedAttributes($model);
        $attributes['delete_images'] = 'Silinəcək şəkillər';

        return $attributes;
     }


    private function translations(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["title:$locale"]                     = ['required', 'string'];
            $rules["content:$locale"]                   = ['nullable', 'string'];
            $rules["meta_title:$locale"]                = ['nullable', 'string'];
            $rules["meta_description:$locale"]          = ['nullable', 'string'];
            $rules["meta_keywords:$locale"]             = ['nullable', 'string'];
        }
        return $rules;
    }
}
