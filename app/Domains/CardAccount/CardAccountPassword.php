<?php

namespace App\Domains\CardAccount;

use App\Domains\Encryption;

class CardAccountPassword extends Encryption
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