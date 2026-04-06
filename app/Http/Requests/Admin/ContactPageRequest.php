<?php

namespace App\Http\Requests\Admin;

use App\Models\ContactPage;

class ContactPageRequest extends TranslatableRequest
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
                'phone' => 'nullable',
                'email' => 'nullable',
                'youtube' => 'nullable',
                'x_social_media' => 'nullable',
                'facebook' => 'nullable',
                'instagram' => 'nullable',
                'linkedin' => 'nullable',
                'location_url' => 'nullable'
            ], $this->translations()),
            self::SCENARIO_UPDATE => array_merge([
                'phone' => 'nullable',
                'email' => 'nullable',
                'youtube' => 'nullable',
                'x_social_media' => 'nullable',
                'facebook' => 'nullable',
                'instagram' => 'nullable',
                'linkedin' => 'nullable',
                'location_url' => 'nullable'

            ], $this->translations()),
            default => [
                'phone' => 'nullable',
                'email' => 'nullable',
                'youtube' => 'nullable',
                'x_social_media' => 'nullable',
                'facebook' => 'nullable',
                'instagram' => 'nullable',
                'linkedin' => 'nullable',
                'location_url' => 'nullable'


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
        $model = new ContactPage();
        $attributes = $this->translatedAttributes($model);
        $attributes['delete_images'] = 'Silinəcək şəkillər';

        return $attributes;    }


    private function translations(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["title:$locale"]                   = ['nullable', 'string'];
            $rules["title2:$locale"]                  = ['nullable', 'string'];
            $rules["title3:$locale"]                  = ['nullable', 'string'];
            $rules["address:$locale"]                 = ['nullable', 'string'];
            $rules["opening_hour:$locale"]            = ['nullable', 'string'];
            $rules["footer:$locale"]                  = ['nullable', 'string'];
            $rules["description:$locale"]             = ['nullable', 'string'];
            $rules["meta_title:$locale"]              = ['nullable', 'string'];
            $rules["meta_keywords:$locale"]           = ['nullable', 'string'];
            $rules["meta_description:$locale"]        = ['nullable', 'string'];
        }
        return $rules;
    }
}
