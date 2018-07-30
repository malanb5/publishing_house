<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class RegisterFormRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ];
    }
}