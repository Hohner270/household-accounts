<?php

namespace App\Domains\CardAccount;

use App\Domains\Cryptogram\Encryption;

use App\Domains\CardAccount\EncryptedCardAccountPassword;

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

    public function encrypt(): EncryptedCardAccountPassword
    {
        return new EncryptedCardAccountPassword($this->encryptedValue());
    }
}