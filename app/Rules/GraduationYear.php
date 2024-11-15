<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class GraduationYear implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  Closure  $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if the value matches the format YYYY/YYYY
        if (!preg_match('/^\d{4}\/\d{4}$/', $value)) {
            $fail("The $attribute must be in the format YYYY/YYYY.");
        }

        // Optionally, you can add additional checks to ensure the years are reasonable
        list($startYear, $endYear) = explode('/', $value);
        if ($startYear < 1900 || $endYear > date('Y')) {
            $fail("The graduation year range must be between 1900 and " . date('Y') . ".");
        }
    }
}
