<?php

namespace App\Domains\CardAccount;

use App\Domains\Cryptogram\Encryption;

use App\Domains\CardAccount\EncryptedCardAccountId;

class CardAccountId extends Encryption
{
    /**
     * @var string $cardAccountId
     */
    private $cardAccountId;

    /**
     * @param string $cardAccountId
     */
    public function __construct(string $cardAccountId)
    {
        $this->cardAccountId = $cardAccountId;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->cardAccountId;
    }

    /**
     * @return EncryptedCardAccountId
     */
    public function encrypt(): EncryptedCardAccountId
    {
        return new EncryptedCardAccountId($this->encryptedValue());
    }
}