<?php

namespace App\Domains\CardAccount;

use App\Domains\Cryptogram\Decryption;

use App\Domains\CardAccount\CardAccountId;

class EncryptedCardAccountId extends Decryption
{
    /**
     * @var string $encryptedCardAccountId
     */
    private $encryptedCardAccountId;

    /**
     * @param string $encryptedCardAccountId
     */
    public function __construct(string $encryptedCardAccountId)
    {
        $this->encryptedCardAccountId = $encryptedCardAccountId;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->encryptedCardAccountId;
    }

    /**
     * @return CardAccountId
     */
    public function decrypt(): CardAccountId
    {
        return new CardAccountId($this->decryptedValue());
    }
}