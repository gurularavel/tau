<?php

namespace App\Http\Requests\Admin;

use App\Models\InternshipProgram;
use App\Rules\NotEmptyHtml;

class InternshipProgramRequest extends TranslatableRequest
{
    protected ?string $sortBy = '-created_at';

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
            self::SCENARIO_INSERT => array_merge(
                [
                    'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'slug' => 'nullable',
                    'place_count' => 'nullable',
                    'duration' => 'nullable',
                    'created_at' => 'nullable',

                ],
                $this->translations(),
            ),
            self::SCENARIO_UPDATE => array_merge(
                [

                    'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'slug' => 'nullable',

                    'place_count' => 'nullable',
                    'created_at' => 'nullable',
                    'duration' => 'nullable',
                    'is_active' => ['nullable', 'boolean'],
                ],
                $this->translations(),
            ),
            default => [
                'id' => 'integer|nullable',

                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'slug' => 'nullable',
                'created_at' => 'nullable',

                'place_count' => 'nullable',
                'duration' => 'nullable',
                'is_active' => ['nullable', 'boolean'],
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
        $model = new InternshipProgram();
        return $this->translatedAttributes($model);
    }

    private function translations(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["title:$locale"] = ['required', 'string'];
            $rules["description:$locale"] = ['nullable', 'string'];
            $rules["meta_title:$locale"] = ['nullable', 'string'];
            $rules["meta_keywords:$locale"] = ['nullable', 'string'];
            $rules["meta_description:$locale"] = ['nullable', 'string'];
        }
        return $rules;
    }
}
