<?php

namespace App\Http\Requests\Admin;

use App\Models\HistoryPage;

class HistoryPageRequest extends TranslatableRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        $base = [
            'breadcrumb'  => 'nullable|image',
            'image1'      => 'nullable|image',
            'image2'      => 'nullable|image',
            'image3'      => 'nullable|image',
            'image4'      => 'nullable|image',
            'stat1_value' => 'nullable|string',
            'stat2_value' => 'nullable|string',
            'stat3_value' => 'nullable|string',
            'stat4_value' => 'nullable|string',
        ];

        return array_merge($base, $this->translations());
    }

    public function attributes(): array
    {
        $model = new HistoryPage();
        return $this->translatedAttributes($model);
    }

    private function translations(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["title:$locale"]            = ['nullable', 'string'];
            $rules["description:$locale"]      = ['nullable', 'string'];
            $rules["subtitle:$locale"]         = ['nullable', 'string'];
            $rules["content:$locale"]          = ['nullable', 'string'];
            $rules["stat1_label:$locale"]      = ['nullable', 'string'];
            $rules["stat2_label:$locale"]      = ['nullable', 'string'];
            $rules["stat3_label:$locale"]      = ['nullable', 'string'];
            $rules["stat4_label:$locale"]      = ['nullable', 'string'];
            $rules["meta_title:$locale"]       = ['nullable', 'string'];
            $rules["meta_description:$locale"] = ['nullable', 'string'];
            $rules["meta_keywords:$locale"]    = ['nullable', 'string'];
        }
        return $rules;
    }
}
