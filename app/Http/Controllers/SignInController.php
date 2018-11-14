<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SignInRequest;
use App\Http\Controllers\Controller;

use App\Services\Auth\SignIn;

class SignInController extends Controller
{
    public function signIn()
    {
        return view('auth.sign_in');
    }

    public function check(SignInRequest $request, SignIn $signIn)
    {
        $email = $request->email;
        $password = $request->password;

        $account = $signIn($email, $password);

        if (! $account) {
            return redirect('/signIn')->with('accountNotFound', 'emailアドレスかパスワードが間違っています');
        }

        return redirect('/');
    }
}
