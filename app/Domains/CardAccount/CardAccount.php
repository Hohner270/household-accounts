<?php

namespace App\Domains\CardAccount\CardAccount;

use App\Domains\CardAccount\CardAccountId;
use App\Domains\CardAccount\CardAccountPassword;

class CardAccount
{
    private $cardAccountId;
    private $cardAccountPassword;

    public function id(): CardAccountId
    {
        return $this->cardAccountId;
    }

    public function password(): CardAccountPassword
    {
        return $this->cardAccountPassword;
    }
}