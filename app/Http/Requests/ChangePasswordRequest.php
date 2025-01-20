<?php
// app/Http/Requests/ChangePasswordRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8|confirmed',
        ];
    }
}
