<?php

namespace App\Domains\CardAccount;

use App\Domains\Collections;

use App\Domains\CardAccount\CardAccount;

class CardAccounts extends Collections
{
    public function add(CardAccount $cardAccount)
    {
        $this->domains->push($cardAccount);
    }
}