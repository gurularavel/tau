<?php

namespace App\Http\Requests\Admin;

use App\Models\HomePage;

class HomePageRequest extends TranslatableRequest
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
                'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp,svg'],
                'image2' => ['required', 'image', 'mimes:jpg,jpeg,png,webp,svg'],
                'image3' => ['required', 'image', 'mimes:jpg,jpeg,png,webp,svg'],


            ], $this->translations()),
            self::SCENARIO_UPDATE => array_merge([
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg'],
                'image2' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg'],
                'image3' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg'],



            ], $this->translations()),
            default => [
                'id' => 'integer|nullable',
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg'],
                'image2' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg'],
                'image3' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg'],





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
        $model = new HomePage();
        $attributes = $this->translatedAttributes($model);
        $attributes['delete_images'] = 'Silinəcək şəkillər';

        return $attributes;    }


    private function translations(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["title:$locale"]                      = ['nullable', 'string'];
            $rules["title2:$locale"]                     = ['nullable', 'string'];
            $rules["title3:$locale"]                     = ['nullable', 'string'];
            $rules["title4:$locale"]                     = ['nullable', 'string'];
            $rules["title5:$locale"]                     = ['nullable', 'string'];
            $rules["description:$locale"]                = ['nullable', 'string'];
            $rules["description2:$locale"]                = ['nullable', 'string'];
            $rules["description3:$locale"]                = ['nullable', 'string'];
            $rules["description4:$locale"]                = ['nullable', 'string'];
            $rules["description5:$locale"]                = ['nullable', 'string'];
        }
        return $rules;
    }
}
