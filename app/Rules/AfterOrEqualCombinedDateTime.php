<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;

class AfterOrEqualCombinedDateTime implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $inputDateTime = Carbon::createFromFormat('Y-m-d H:i', $value);
        $currentDateTime = Carbon::now()->format('Y-m-d H:i');

        if ($inputDateTime->lt($currentDateTime)) {
            $fail("The {$attribute} must be after or equal to the current date and time.");
        }
    }
}
