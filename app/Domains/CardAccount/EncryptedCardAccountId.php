<?php

namespace App\Domains\CardAccount;

use App\Domains\Cryptgram\Encryption;

class EncryptedCardAccountId extends Encryption
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
}