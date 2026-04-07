<?php

namespace App\Http\Requests\Admin;

use App\Models\Language;
use App\Models\Announcement;
use App\Rules\NotEmptyHtml;
use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends TranslatableRequest
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
                    'user_id' => ['required', 'exists:users,id'],
                    'created_at' => 'nullable',
                    'tags' => 'nullable',

                    'image' => ['required', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                ],
                $this->translations(),
            ),
            self::SCENARIO_UPDATE => array_merge(
                [
                    'user_id' => ['nullable', 'exists:users,id'],

                    'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'status' => ['required', 'boolean'],
                    'tags' => 'nullable',
                    'created_at' => 'nullable',

                    'delete_images.*' => ['nullable', 'integer', 'exists:announcement_images,id'],
                ],
                $this->translations(),
            ),
            default => [
                'id' => 'integer|nullable',
                'tags' => 'nullable',
                'user_id' => ['nullable', 'exists:users,id'],

                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'view_counts' => ['nullable', 'boolean'],
                'status' => ['nullable', 'boolean'],
                'delete_images' => ['nullable', 'integer'],
                'created_at' => 'nullable',

                'delete_images.*' => ['nullable', 'integer', 'exists:announcement_images,id'],
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
        $model = new Announcement();
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
