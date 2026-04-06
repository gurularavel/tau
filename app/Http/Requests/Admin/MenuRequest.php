<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;

class MenuRequest extends TranslatableRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        $commonRules = [
            'parent_id' => ['nullable', 'exists:menus,id'],
            'type'      => ['nullable', Rule::in(['link', 'text_block', 'image_block', 'small_block'])],
            'image'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp', 'max:2048'],
            'slug'      => ['nullable', 'string', 'max:255'],
            'order'     => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ];

        return match ($this->scenario) {
            self::SCENARIO_INSERT, self::SCENARIO_UPDATE => array_merge(
                $commonRules,
                $this->translations()
            ),
            default => $commonRules,
        };
    }

    private function translations(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["title:$locale"] = ['required', 'string', 'max:255'];
        }
        return $rules;
    }

    public function attributes(): array
    {
        return [
            'parent_id' => __('translate.Parent Menu'),
            'type'      => __('translate.Type'),
            'image'     => __('translate.Image'),
            'title:*'   => __('translate.Title'),
        ];
    }
}
