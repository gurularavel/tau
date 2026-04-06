<?php

namespace App\Http\Requests\Admin;

use App\Models\Project;
use App\Rules\NotEmptyHtml;

class ProjectRequest extends TranslatableRequest
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
                    'project_category_id' => ['exists:project_categories,id'],
                    'image' => ['required', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'slug' => 'nullable',
                    'publisher_count' => 'nullable',
                    'participant_count' => 'nullable',
                    'duration' => 'nullable',
                    'partners' => 'nullable',
                ],
                $this->translations(),
            ),
            self::SCENARIO_UPDATE => array_merge(
                [
                    'project_category_id' => ['exists:project_categories,id'],

                    'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'slug' => 'nullable',
                    'partners' => 'nullable',
                    'publisher_count' => 'nullable',
                    'participant_count' => 'nullable',
                    'created_at' => 'nullable',
                    'duration' => 'nullable',
                    'is_active' => ['nullable', 'boolean'],
                ],
                $this->translations(),
            ),
            default => [
                'id' => 'integer|nullable',
                'project_category_id' => ['exists:project_categories,id'],

                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'slug' => 'nullable',
                'created_at' => 'nullable',
                'partners' => 'nullable',
                'publisher_count' => 'nullable',
                'participant_count' => 'nullable',
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
        $model = new Project();
        return $this->translatedAttributes($model);
    }

    private function translations(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["title:$locale"] = ['required', 'string'];
            $rules["description:$locale"] = ['nullable', 'string'];
            $rules["author:$locale"] = ['nullable', 'string'];
            $rules["meta_title:$locale"] = ['nullable', 'string'];
            $rules["meta_keywords:$locale"] = ['nullable', 'string'];
            $rules["meta_description:$locale"] = ['nullable', 'string'];
        }
        return $rules;
    }
}
