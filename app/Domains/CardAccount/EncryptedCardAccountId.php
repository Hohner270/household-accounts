<?php

namespace App\Domains\CardAccount;

use App\Domains\Cryptogram\Decryption;

use App\Domains\CardAccount\CardAccountId;

class EncryptedCardAccountId extends Decryption
{
    private $encryptedCardAccountId;

    public function __construct(string $encryptedCardAccountId)
    {
        $this->encryptedCardAccountId = $encryptedCardAccountId;
    }

    public function value(): string
    {
        return $this->encryptedCardAccountId;
    }

    public function decrypt(): CardAccountId
    {
        return new CardAccountId($this->decryptedValue());
    }
}