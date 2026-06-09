<?php

namespace App\Http\Requests\Admin;

use App\Models\StudentLifeClub;
use App\Rules\NotEmptyHtml;

class StudentLifeClubRequest extends TranslatableRequest
{

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return match ($this->scenario) {
            self::SCENARIO_INSERT => array_merge([
                'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp'],
            ], $this->translations()),
            self::SCENARIO_UPDATE => array_merge([
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
            ], $this->translations()),
            default => [
                'id' => 'integer|nullable',
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
            ],
        };
    }

    public function attributes(): array
    {
        $model = new StudentLifeClub();
        return $this->translatedAttributes($model);
    }


    private function translations(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["title:$locale"]                     = ['required', 'string'];
            $rules["description:$locale"]               = ['nullable', 'string'];
            $rules["meta_title:$locale"]                = ['nullable', 'string'];
            $rules["meta_keywords:$locale"]             = ['nullable', 'string'];
            $rules["meta_description:$locale"]          = ['nullable', 'string'];
        }
        return $rules;
    }
}
