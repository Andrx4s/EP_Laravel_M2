<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateValidation extends FormRequest
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
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'role_id' => 'required|exists:roles,id'
        ];
    }
}
