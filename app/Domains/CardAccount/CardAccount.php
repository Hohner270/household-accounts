<?php

namespace App\Domains\CardAccount\CardAccount;

use App\Domains\CardAccount\EncryptedCardAccountId;
use App\Domains\CardAccount\EncryptedCardAccountPassword;

class CardAccount
{
    private $id;
    private $password;

    public function __construct(EncryptedCardAccountId $id, EncryptedCardAccountPassword $password)
    {
        $this->id = $id;
        $this->password = $password;
    }

    public function id(): EncryptedCardAccountId
    {
        return $this->id;
    }

    public function password(): EncryptedCardAccountPassword
    {
        return $this->password;
    }
}