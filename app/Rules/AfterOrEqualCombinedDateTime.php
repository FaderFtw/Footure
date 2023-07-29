<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;

class AfterOrEqualCombinedDateTime implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $inputDateTime = Carbon::createFromFormat('m/d/Y H:i', $value);
        $currentDateTime = Carbon::now()->format('m/d/Y H:i');

        if ($inputDateTime->lt($currentDateTime)) {
            $fail("The {$attribute} must be after or equal to the current date and time.");
        }
    }
}
