<?php

namespace App\Domains\CardAccount;

class CardAccountPassword
{
    private $cardPassword;

    public function __construct(string $cardPassword)
    {
        $this->cardPassword = $cardPassword;
    }

    public function value(): string
    {
        return $this->cardPassword;
    }
}