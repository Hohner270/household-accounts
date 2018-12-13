<?php

namespace App\Domains\CardAccount;

use App\Domains\Cryptogram\Decryption;

use App\Domains\CardAccount\CardAccountPassword;

class EncryptedCardAccountPassword extends Decryption
{
    /**
     * @var string $encryptedCardAccountPassword
     */
    private $encryptedCardAccountPassword;

    /**
     * @param string $encryptedCardAccountPassword
     */
    public function __construct(string $encryptedCardAccountPassword)
    {
        $this->encryptedCardAccountPassword = $encryptedCardAccountPassword;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->encryptedCardAccountPassword;
    }

    /**
     * @return CardAccountPassword
     */
    public function decrypt(): CardAccountPassword
    {
        return new CardAccountPassword($this->decryptedValue());
    }
}