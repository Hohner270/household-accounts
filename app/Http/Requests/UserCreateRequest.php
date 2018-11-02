<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'account_name'          => 'required|unique:users,name|max:255',
            'email'                 => 'required|unique:users,email|max:255',
            'password'              => 'required|min:8 | confirmed',
            'password_confirmation' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'account_name.required'          => 'アカウント名を入力してください',
            'email.required'                 => 'emailを入力してください',
            'password.required'              => 'パスワードを入力してください',
            'password_confirmation.required' => '確認用パスワードを入力してください',
            'password.confirmed'             => '確認用パスワードと一致しません',
        ];
    }

    
}
