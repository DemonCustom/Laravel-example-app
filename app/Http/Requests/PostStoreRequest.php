<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool // разрешить ли выполнение для незарегистрированных пользователей
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array // правила по которым будем валидировать
    {
        return [
            'name'        => 'required|string|min:3|max:25',
            'description' => 'string|min:3|max:25',
            'content'     => 'required|string|min:10',
            'poster'      => 'required'
        ];
    }
}
