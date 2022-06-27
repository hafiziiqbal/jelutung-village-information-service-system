<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone_number' => 'required|numeric|digits_between:4,14',
            'pin' => 'required|numeric|digits:6',
        ];
    }

    public function messages()
    {
        return [
            'phone_number.required' => 'No. HP harus diisi',
            'phone_number.numeric' => 'No. HP harus berupa angka',
            'phone_number.digits_between' => 'No. HP minimal 4 digit dan maksimal 14 digit',

            'pin.required' => 'Kode PIN harus diisi',
            'pin.numeric' => 'Kode PIN harus berupa angka',
            'pin.digits'  => 'Kode PIN harus 6 digit',
        ];
    }
}
