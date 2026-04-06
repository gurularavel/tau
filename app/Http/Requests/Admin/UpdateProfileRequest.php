<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Crud\Requests\AppFormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateProfileRequest extends AppFormRequest
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
                'email' => ['required', 'email', 'unique:users'],
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
                'password' => [
                    'required',
                    'string',
                    Password::min(8)
                        ->mixedCase()
                        ->letters()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()
                ],
            ],
            self::SCENARIO_UPDATE => [
                'name' => ['required', 'string', 'max:20'],
                'email' => ['required', 'email', 'unique:users,id,' . $this->id],
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
                'password' => [
                    'nullable',
                    'string',
                    Password::min(8)
                        ->mixedCase()
                        ->letters()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()
                ]
            ],
            default => [
                'id' => ['nullable', 'integer'],
                'name' => ['nullable', 'string', 'max:20'],
                'email' => ['nullable', 'email', 'unique:users'],
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
                'password' => [
                    'nullable',
                    'string',
                    Password::min(8)
                        ->mixedCase()
                        ->letters()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()
                ]
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
        return User::attributes();
    }
}
