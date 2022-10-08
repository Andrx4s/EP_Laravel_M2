<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class NewUserValidation extends FormRequest
{
    /**
     * Опредляет авторизован ли пользователь для выполнения запроса
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Правила проверки применимые к запросу
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
