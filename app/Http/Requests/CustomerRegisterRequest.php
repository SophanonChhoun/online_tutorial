<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|max:255',
            'password' => 'required|min:5|max:8',
            'first_name' => 'required',
            'last_name' => 'required',
        ];
    }
}
