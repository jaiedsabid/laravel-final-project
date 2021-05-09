<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'name' => 'required|min:4|max:40|alpha',
            'email' => 'required|email:rfc|min:10|max:40|unique:users,email,'. $this->id .'id',
            'password' => 'required|min:4|max:20|confirmed',
            'address' => 'required|min:5|max:40',
        ];
    }
}
