<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NikValidation implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Check if the NIK has exactly 16 digits
        if (!preg_match('/^\d{16}$/', $value)) {
            return false;
        }

        // Additional NIK validation logic (e.g., checksum, region codes) can be added here

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid NIK.';
    }
}
