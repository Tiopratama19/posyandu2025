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
        // Pastikan NIK terdiri dari tepat 16 digit angka
        if (!preg_match('/^\d{16}$/', $value)) {
            return false;
        }

        // Validasi kode wilayah (4-6 digit pertama)
        if (!$this->validateRegionCode(substr($value, 0, 6))) {
            return false;
        }

        // Jika semua validasi lolos, kembalikan true
        return true;
    }

    /**
     * Validasi kode wilayah berdasarkan pola yang fleksibel.
     *
     * @param  string  $regionCode
     * @return bool
     */
    private function validateRegionCode($regionCode)
    {
        // Pola untuk kode wilayah Indonesia (contoh: mulai dari 11-94)
        return preg_match('/^(1[1-9]|[2-9][0-9])\d{2,4}$/', $regionCode);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid NIK with 16 digits and a valid region code.';
    }
}
