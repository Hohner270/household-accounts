<?php

namespace App\Domains\CardAccount;

use App\Domains\Cryptogram\Encryption;

use App\Domains\CardAccount\EncryptedCardAccountPassword;

class CardAccountPassword extends Encryption
{
    /**
     * @var string $cardPassword
     */
    private $cardPassword;

    /**
     * @param string $cardPassword
     */
    public function __construct(string $cardPassword)
    {
        $this->cardPassword = $cardPassword;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->cardPassword;
    }

    /**
     * @return EncryptedCardAccountPassword
     */
    public function encrypt(): EncryptedCardAccountPassword
    {
        return new EncryptedCardAccountPassword($this->encryptedValue());
    }
}