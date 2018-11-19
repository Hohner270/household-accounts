<?php

namespace App\Domains\CardAccount;

use App\Domains\Encryption;

class CardAccountId extends Encryption
{
    private $cardAccountId;

    public function __construct(string $cardAccountId)
    {
        $this->cardAccountId = $cardAccountId;
    }

    public function value(): string
    {
        return $this->cardAccountId;
    }
}