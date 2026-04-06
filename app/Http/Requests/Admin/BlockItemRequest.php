<?php

namespace App\Http\Requests\Admin;

use App\Models\BlockItem;

class BlockItemRequest extends TranslatableRequest
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
                    'block_id' => ['nullable', 'integer', 'exists:blocks,id'],
                    'order' => ['nullable'],
                ],
                $this->translations(),
                $this->blockItemsValidation(),
            ),
            self::SCENARIO_UPDATE => array_merge(
                [
                    'order' => ['nullable'],
                    'block_id' => ['nullable', 'integer', 'exists:blocks,id'],
                    'slug' => ['nullable'],
                    'url' => ['nullable'],
                    'is_active' => ['nullable', 'boolean'],
                ],
                $this->translations(),
            ),
            default => [
                'id' => 'integer|nullable',
                'is_active' => ['nullable', 'boolean'],
                'order' => ['nullable'],
                'url' => ['nullable'],
                'block_id' => ['nullable', 'integer', 'exists:blocks,id'],
                'slug' => ['nullable'],
            ],
        };
    }

    public function attributes(): array
    {
        $model = new BlockItem();
        $attributes = $this->translatedAttributes($model);

        foreach ($this->locales() as $locale) {
            $attributes["block_items.$locale"] = "Block items ($locale)";
        }

        return $attributes;
    }

    private function translations(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["title:$locale"] = ['nullable', 'string'];
        }
        return $rules;
    }

    private function blockItemsValidation(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["block_items.$locale.titles"] = ['nullable', 'array'];
            $rules["block_items.$locale.titles.*"] = ['nullable', 'string', 'max:255'];
        }

        $rules['block_items.slugs'] = ['nullable', 'array'];
        $rules['block_items.slugs.*'] = ['nullable', 'string', 'max:255'];
        $rules['block_items.urls'] = ['nullable', 'array'];
        $rules['block_items.urls.*'] = ['nullable', 'string', 'max:255'];
        return $rules;
    }
}
