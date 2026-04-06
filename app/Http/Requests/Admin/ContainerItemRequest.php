<?php

namespace App\Http\Requests\Admin;

use App\Models\ContainerItem;

class ContainerItemRequest extends TranslatableRequest
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
                    'container_id' => ['nullable', 'integer', 'exists:containers,id'],
                    'order' => ['nullable'],
                ],
                $this->translations(),
                $this->containerItemsValidation(),
            ),
            self::SCENARIO_UPDATE => array_merge(
                [
                    'order' => ['nullable'],
                    'container_id' => ['nullable', 'integer', 'exists:containers,id'],
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
                'container_id' => ['nullable', 'integer', 'exists:containers,id'],
                'slug' => ['nullable'],
            ],
        };
    }

    public function attributes(): array
    {
        $model = new ContainerItem();
        $attributes = $this->translatedAttributes($model);

        foreach ($this->locales() as $locale) {
            $attributes["container_items.$locale"] = "Container items ($locale)";
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

    private function containerItemsValidation(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["container_items.$locale.titles"] = ['nullable', 'array'];
            $rules["container_items.$locale.titles.*"] = ['nullable', 'string', 'max:255'];
        }

        $rules['container_items.slugs'] = ['nullable', 'array'];
        $rules['container_items.slugs.*'] = ['nullable', 'string', 'max:255'];
        $rules['container_items.urls'] = ['nullable', 'array'];
        $rules['container_items.urls.*'] = ['nullable', 'string', 'max:255'];
        return $rules;
    }
}
