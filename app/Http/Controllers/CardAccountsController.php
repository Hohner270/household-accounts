<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Domains\Card\CardFindRepository;
use App\Domains\Card\CardId;

use App\Http\Requests\CardAccountRequest;
use App\Services\CardAccount\RegisterCardAccount;

class CardAccountsController extends Controller
{
    private $cardFindRepo;

    public function __construct(CardFindRepository $cardFindRepo)
    {
        $this->cardFindRepo = $cardFindRepo;
    }

    public function create()
    {
        $cards = $this->cardFindRepo->findAll();
        $data = [
            'cards' => $cards->collect(),
        ];

        return view('card_accounts.create', $data);
    }

    public function store(CardAccountRequest $request, RegisterCardAccount $registerCardAccount)
    {
        $account = $this->getAccount();

        $cardId = new CardId($request->cardId);
        $card = $this->cardFindRepo->findById($cardId);

        $cardAccount = $registerCardAccount(
            $card->id(),
            $account,
            $request->cardAccountId,
            $request->cardAccountPassword
        );

        return redirect('/');
    }
}
