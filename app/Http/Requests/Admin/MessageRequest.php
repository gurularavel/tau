<?php

namespace App\Http\Requests\Admin;

use App\Models\Message;
use Crud\Requests\AppFormRequest;

class MessageRequest extends AppFormRequest
{
    protected ?string $sortBy = '-created_at';

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
        return [
            'id' => 'integer|nullable',
            'name' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:30'],
            'text' => ['nullable', 'string', 'max:65535']
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return Message::attributes();
    }
}
