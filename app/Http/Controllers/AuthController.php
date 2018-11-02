<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SignInRequest;
use App\Http\Controllers\Controller;

use App\Services\Auth\SignIn;

class AuthController extends Controller
{
    public function signIn()
    {
        return view('auth.sign_in');
    }

    public function signInCheck(SignInRequest $request, SignIn $signIn)
    {
        $accountName = $request->accunt_name;
        $password = $request->password;

        $signIn($accountName, $password);

        return redirect('/');
    }
}
