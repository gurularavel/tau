<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class EmailOrPhoneRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param \Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $validatedEmail = filter_var($value, FILTER_VALIDATE_EMAIL);
        $validatedPhone = preg_match('/^\+?\d{10,}$/', $value);

        if(!$validatedEmail && !$validatedPhone) {
            $fail(trans('validation.email_or_phone', [':attribute' => trans('translations.your_contact_info')]));
        }
    }
}
