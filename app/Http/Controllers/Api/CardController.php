<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Domains\Card\CardFindRepository;
use App\Domains\Card\Cards;

class CardController extends Controller
{
    public function index(CardFindRepository $cardFindRepo)
    {
        $cards = $cardFindRepo->findAll();
        $cardList = $this->cardsToArray($cards);
        
        return response()->json(['cards' => $cardList]);
    }

    public function cardsToArray(Cards $cards)
    {
        $cardList = [];
        foreach ($cards->collect() as $card) {
            $cardList[] = [
                'id' => $card->id(),
                'cardName' => $card->cardName()
            ];
        }

        return $cardList;
    }
}