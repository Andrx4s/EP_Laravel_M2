<?php

namespace App\Http\Requests\User\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateValidation extends FormRequest
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
            'name' => 'required',
            'full_description' => 'required',
            'short_description' => 'required|max:50',
            'tag' => 'required',
            'photo_file' => 'nullable|max:2048|file|image',
        ];
    }
}
