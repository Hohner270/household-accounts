<?php

namespace App\Domains\CardAccount;

use App\Domains\Cryptogram\Decryption;

use App\Domains\CardAccount\CardAccountPassword;

class EncryptedCardAccountPassword extends Decryption
{
    private $encryptedCardAccountPassword;

    public function __construct(string $encryptedCardAccountPassword)
    {
        $this->encryptedCardAccountPassword = $encryptedCardAccountPassword;
    }

    public function value(): string
    {
        return $this->encryptedCardAccountPassword;
    }

    public function decrypt(): CardAccountPassword
    {
        return new CardAccountPassword($this->decryptedValue());
    }
}