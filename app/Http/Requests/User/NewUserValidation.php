<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class NewUserValidation extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullname' => 'required',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|unique:users',
            'birthday' => 'required|date',
            'photo_file' => 'required|max:2048|file|image',
            'role_id' => 'required'
        ];
    }
}
