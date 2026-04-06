<?php

namespace App\Http\Requests\Admin;

use App\Models\CampusGalleryPage;
use App\Models\CareerPage;
use App\Rules\NotEmptyHtml;

class CampusGalleryPageRequest extends TranslatableRequest
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
                    'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'image2' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'image3' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'image4' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'image5' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'video_url' => ['nullable', 'url'],
                ],
                $this->translations(),
            ),
            self::SCENARIO_UPDATE => array_merge(
                [
                    'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'image2' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'image3' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'image4' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'image5' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                    'video_url' => ['nullable', 'url'],
                ],
                $this->translations(),
            ),
            default => [
                'id' => 'integer|nullable',
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'image2' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'image3' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'image4' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'image5' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
                'video_url' => ['nullable', 'url'],
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
        $model = new CampusGalleryPage();
        return $this->translatedAttributes($model);
    }

    private function translations(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["title:$locale"] = ['nullable', 'string'];
            $rules["description:$locale"] = ['nullable', 'string'];
            $rules["title2:$locale"] = ['nullable', 'string'];
            $rules["description2:$locale"] = ['nullable', 'string'];
            $rules["description3:$locale"] = ['nullable', 'string'];
            $rules["meta_title:$locale"] = ['nullable', 'string'];
            $rules["meta_keywords:$locale"] = ['nullable', 'string'];
            $rules["meta_description:$locale"] = ['nullable', 'string'];
        }
        return $rules;
    }
}
