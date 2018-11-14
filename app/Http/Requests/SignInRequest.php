<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Services\Auth\SignIn;

class SignInRequest extends FormRequest
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
            'email'                 => 'required|exists:users,email|max:255',
            'password'              => 'required|min:8|max:60',
        ];
    }

    public function messages()
    {
        return [
            'email.required'                 => 'emailを入力してください',
            'email.exists'                   => 'emailアドレスかパスワードが間違っています',
            'email.max'                      => 'emailを255文字以内で入力してください',
            'password.required'              => 'パスワードを入力してください',
            'password.min'                   => 'パスワードを8文字以上で入力してください',
            'password.max'                   => 'パスワードを60文字以内で入力してください',
        ];
    }
}
