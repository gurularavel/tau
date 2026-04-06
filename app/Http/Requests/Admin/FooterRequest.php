<?php

namespace App\Http\Requests\Admin;

use App\Models\Footer;
use App\Rules\NotEmptyHtml;

class FooterRequest extends TranslatableRequest
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
                ],
                $this->translations(),
            ),
            self::SCENARIO_UPDATE => array_merge(
                [
                    'order' => 'nullable',

                    'is_active' => ['nullable', 'boolean'],
                ],
                $this->translations(),
            ),
            default => [
                'id' => 'integer|nullable',

                'order' => 'nullable',

                'is_active' => ['nullable', 'boolean'],
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
        $model = new Footer();
        return $this->translatedAttributes($model);
    }

    private function translations(): array
    {
        $rules = [];
        foreach ($this->locales() as $locale) {
            $rules["title:$locale"] = ['required', 'string'];
        }
        return $rules;
    }
}
