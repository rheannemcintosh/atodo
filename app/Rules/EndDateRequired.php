<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EndDateRequired implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $type = request()->input('type');

        if ($type !== 'Daily' && empty($value)) {
            $fail('The end date is required for weekly, monthly, and project-based to-do lists.');
        }
    }
}
