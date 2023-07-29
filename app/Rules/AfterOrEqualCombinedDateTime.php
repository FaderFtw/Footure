<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class AfterOrEqualCombinedDateTime implements Rule
{
    protected $combinedDateTime;

    public function __construct($combinedDateTime)
    {
        $this->combinedDateTime = $combinedDateTime;
    }

    public function passes($attribute, $value)
    {
        $inputDateTime = Carbon::createFromFormat('Y-m-d H:i', $this->combinedDateTime);
        $currentDateTime = Carbon::now();

        return $inputDateTime->gte($currentDateTime);
    }

    public function message()
    {
        return 'The :attribute must be after or equal to the current date and time.';
    }
}
