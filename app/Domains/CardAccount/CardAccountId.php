<?php

namespace App\Domains\CardAccount;

use App\Domains\Cryptogram\Encryption;

use App\Domains\CardAccount\EncryptedCardAccountId;

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

    public function encrypt(): EncryptedCardAccountId
    {
        return new EncryptedCardAccountId($this->encryptedValue());
    }
}