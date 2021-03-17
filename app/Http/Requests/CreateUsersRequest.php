<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsersRequest extends FormRequest
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
            'name' => 'required|min:5|max:40|regex:/([a-zA-Z ]+)/i',
            'email' => 'required|email:rfc|unique:users,email|min:10|max:40|',
            'address' => 'required|min:5|max:40|regex:/([a-zA-Z0-9 ,-]+)/i',
            'password' => 'required|confirmed|min:4|max:20'
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'Name must contain alphabets only.',
            'address.regex' => 'Please address must be in correct format.'
        ];
    }
}
