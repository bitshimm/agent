<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'current_password' => 'required_with_all:new_password, new_password_confirmation',
            'new_password' => 'required_with:current_password|min:6|nullable',
            'new_password_confirmation' => 'required_with:new_password',
        ];
    }
    public function messages()
    {
        return[
            'current_password.required_with_all' => 'Вы не ввели действующий пароль',
            'new_password.required_with' => 'Вы не ввели новый пароль',
            'new_password_confirmation.required_with' => 'Вы не подтвердили новый пароль',
            'new_password.min' => 'Новый пароль должен содержать не менее 6 символов',
        ];
    }
}
