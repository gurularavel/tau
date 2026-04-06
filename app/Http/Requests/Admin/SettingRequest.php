<?php

namespace App\Http\Requests\Admin;

use App\Enums\SettingType;
use App\Models\Setting;
use Crud\Requests\AppFormRequest;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\File;

class SettingRequest extends AppFormRequest
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
            self::SCENARIO_UPDATE => [
                'type' => ['nullable', 'string', new Enum(SettingType::class)],
                'keyword' => ['exclude'],
                'file' => [
                    'required_if:type,' . SettingType::FILE?->value,
                    'exclude_if:type,' . SettingType::TEXT?->value,
                    File::types(['pdf', 'svg', 'jpg', 'png', 'jpeg', 'xlsx', 'xls', 'doc', 'docx'])->max('10mb'),
                ],
                'value' => [
                    'required_if:type,' . SettingType::TEXT?->value,
                    'exclude_if:type,' . SettingType::FILE?->value,
                    'string',
                    'max:65535',
                ],
            ],
            default => [
                'id' => 'integer|nullable',
                'type' => ['nullable', 'string', new Enum(SettingType::class)],
                'keyword' => ['nullable', 'string', 'max:50'],
                'value' => ['nullable', 'string', 'max:65535'],
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
        return Setting::attributes();
    }
}
