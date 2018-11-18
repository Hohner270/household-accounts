<?php

namespace App\Domains\CardAccount;

class CardAccountId
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