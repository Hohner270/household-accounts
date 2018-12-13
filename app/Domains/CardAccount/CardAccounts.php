<?php

namespace App\Domains\CardAccount;

use App\Domains\Collections;

use App\Domains\Card\Card;

use App\Domains\CardAccount\CardAccount;

class CardAccounts extends Collections
{
    /**
     * @param CardAccount $cardAccount
     */
    public function add(CardAccount $cardAccount)
    {
        $this->domains->push($cardAccount);
    }

    /**
     * @return CardAccount
     */
    public function eposCardAccount(): CardAccount
    {
        return $this->domains->filter(function (CardAccount $cardAccount) {
            return Card::EPOS_CARD === $cardAccount->cardId()->value();
        })->first();
    }
}