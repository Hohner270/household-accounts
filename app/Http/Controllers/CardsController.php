<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CardAccountRequest;
use App\Services\CardAccount\RegisterCardAccount;

class CardsController extends Controller
{
    public function create()
    {
        return view('cards.create');
    }

    public function store(CardAccountRequest $request, RegisterCardAccount $service)
    {
        $cardAccount = $service(
            $request->cardId,
            $request->accountId,
            $request->cardAccountId,
            $request->cardAccountPassword
        );

        return redirect('/');
    }
}
