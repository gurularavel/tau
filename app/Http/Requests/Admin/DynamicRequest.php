<?php

namespace App\Http\Requests\Admin;

use App\Models\Language;
use App\Models\Dynamic;
use App\Rules\NotEmptyHtml;
use Illuminate\Foundation\Http\FormRequest;

class DynamicRequest extends TranslatableRequest
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
            self::SCENARIO_INSERT => array_merge(
                [

                    'order' => 'nullable',

                    'image' => ['required', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                ],
                $this->translations(),
            ),
            self::SCENARIO_UPDATE => array_merge(
                [


                    'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'is_active' => ['required', 'boolean'],
                    'created_at' => 'nullable',

                    'delete_images.*' => ['nullable', 'integer', 'exists:dynamic_images,id'],
                ],
                $this->translations(),
            ),
            default => [
                'id' => 'integer|nullable',

                'order' => ['nullable'],

                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'is_active' => ['nullable', 'boolean'],
                'delete_images' => ['nullable', 'integer'],

                'delete_images.*' => ['nullable', 'integer', 'exists:dynamic_images,id'],
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
        $model = new Dynamic();
        $attributes = $this->translatedAttributes($model);
        $attributes['delete_images'] = 'Silinəcək şəkillər';

        return $attributes;
    }

    private function translations(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["title:$locale"] = ['required', 'string'];
            $rules["content:$locale"] = ['nullable', 'string'];
            $rules["description:$locale"] = ['nullable', 'string'];
            $rules["meta_title:$locale"] = ['nullable', 'string'];
            $rules["meta_keywords:$locale"] = ['nullable', 'string'];
            $rules["meta_description:$locale"] = ['nullable', 'string'];
        }
        return $rules;
    }
}
