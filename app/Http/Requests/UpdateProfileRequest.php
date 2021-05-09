<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'sometimes|min:4|max:30',
            'email' => 'email:rfc|min:10|max:50|unique:users,email,'. session()->get('id') . 'id',
            'password' => 'required|min:4|max:10|confirmed',
            'address' => 'required',
            'image_file' => 'file|image|mimes:jpg,bmp,png,jpeg|max:5000'
        ];
    }
}
