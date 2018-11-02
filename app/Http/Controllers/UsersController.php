<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserCreateRequest;
use App\Services\Account\RegisterAccount;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(UserCreateRequest $request, RegisterAccount $registerAccount)
    {
        $accountName = $request->account_name;
        $email = $request->email;
        $password = $request->password;

        $account = $registerAccount($accountName, $email, $password);

        return redirect('/');
    }
}
