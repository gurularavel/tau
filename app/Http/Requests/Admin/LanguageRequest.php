<?php

namespace App\Http\Requests\Admin;

use App\Models\Language;
use App\Rules\MainLanguageRule;
use Crud\Requests\AppFormRequest;
use Illuminate\Validation\Rule;

class LanguageRequest extends AppFormRequest
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
            self::SCENARIO_INSERT => [
                'name' => ['required', 'string', 'max:20'],
                'locale' => [
                    'required',
                    'string',
                    'lowercase',
                    'size:2',
                    Rule::unique('languages', 'locale'),
                ],
                'is_main' => [
                    'boolean',
                ],
                'is_active' => [
                    'boolean',
                ],
            ],
            self::SCENARIO_UPDATE => [
                'name' => ['required', 'string', 'max:20'],

                'locale' => [
                    'required',
                    'string',
                    'lowercase',
                    'size:2',
                    Rule::unique('languages', 'locale')
                        ->ignoreModel($this->language),
                ],
                'is_main' => [
                    'required',
                    'boolean',
                ],
                'is_active' => [
                    'required',
                    'boolean',
                ],
            ],
            default => [
                'id' => ['integer', 'nullable'],
                'name' => ['nullable', 'string', 'max:20'],
                'locale' => ['nullable', 'string', 'max:2', 'unique:languages,locale'],
                'is_main' => ['nullable', 'boolean'],
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
        return Language::attributes();
    }
}
