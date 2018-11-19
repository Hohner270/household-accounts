<?php

namespace App\Domains\CardAccount;

use App\Domains\Cryptogram\Decryption;

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
}