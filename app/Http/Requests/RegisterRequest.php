<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:30|regex:/[a-zA-Z0-9]/i',
            'email' => 'required|unique:users|email:rfc|max:50|min:10',
            'password' => 'required|min:4|max:20',
            'con_password' => 'required_with:password|same:password|min:4|max:20',
            'address' => 'required|min:8',
            'image_file' => 'image',
        ];
    }
}
