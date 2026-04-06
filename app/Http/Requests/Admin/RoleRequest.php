<?php

namespace App\Http\Requests\Admin;

use App\Models\Role;
use Crud\Requests\AppFormRequest;

class RoleRequest extends AppFormRequest
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
            self::SCENARIO_INSERT, self::SCENARIO_UPDATE => [
                'name' => ['required', 'string', 'max:255'],
                'permissions_id' => ['required', 'array', 'exists:permissions,id'],
                'permissions_id.*' => ['distinct'],
            ],
            default => [
                'id' => 'integer|nullable',
                'name' => ['nullable', 'string', 'max:255'],
                'permissions_id' => ['nullable', 'array', 'exists:permissions,id'],
                'permissions_id.*' => ['distinct'],
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
        return Role::attributes();
    }
}
