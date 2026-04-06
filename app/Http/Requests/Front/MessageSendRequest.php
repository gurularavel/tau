<?php

namespace App\Http\Requests\Front;

use App\Models\Message;
use App\Rules\EmailOrPhoneRule;
use App\Traits\Responseable;
use Crud\Requests\AppFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Http;

class MessageSendRequest extends AppFormRequest
{
    use Responseable;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
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
                'name' => ['required', 'string', 'max:30'],
                'email' => ['required', 'max:30', new EmailOrPhoneRule()],
                'phone' => ['required', 'max:30'],
                'text' => ['required', 'string', 'min:3', 'max:65535'],
                // 'g-recaptcha-response' => ['required', function ($attribute, $value, $fail) {
                //     $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                //         'secret' => env('RECAPTCHA_SECRET_KEY'),
                //         'response' => $value,
                //         'remoteip' => request()->ip(),
                //     ]);

                // }],
            ],
            default => [
                'id' => 'integer|nullable',
                'name' => ['nullable', 'string', 'max:30'],
                'phone' => ['nullable', 'max:30'],
                'email' => ['nullable', new EmailOrPhoneRule(), 'max:30'],
                'text' => ['nullable', 'string', 'min:3', 'max:65535']
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
        return Message::attributes();
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
        );
    }

}
