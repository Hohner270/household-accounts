<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CardAccountRequest extends FormRequest
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
            'cardId'              => 'required|integer',
            'cardAccountId'       => 'required|string|max:255',
            'cardAccountPassword' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'cardId.required'              => 'カードを選択してください',
            'cardId.integer'               => '数値で数値で入力してください',
            
            'cardAccountId.required'       => '選択したカードのログインIDを入力してください',
            'cardAccountId.string'         => '文字列で入力してください',
            'cardAccountId.max'            => '255文字以内で入力してください',

            'cardAccountPassword.required' => '選択したカードのログインパスワードを入力してください',
            'cardAccountPassword.string'   => '文字列で入力してください',
            'cardAccountPassword.max'      => '255文字以内で入力してください'
        ];
    }

    public function toDomain()
    {

    }
}
