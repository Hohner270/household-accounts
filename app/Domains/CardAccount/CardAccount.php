<?php

namespace App\Domains\CardAccount;

use App\Domains\CardAccount\EncryptedCardAccountId;
use App\Domains\CardAccount\EncryptedCardAccountPassword;

use App\Domains\Card\CardId;

class CardAccount
{
    private $id;
    private $password;
    private $cardId;

    public function __construct(EncryptedCardAccountId $id, EncryptedCardAccountPassword $password, CardId $cardId)
    {
        $this->id = $id;
        $this->password = $password;
        $this->cardId = $cardId;
    }

    public function id(): EncryptedCardAccountId
    {
        return $this->id;
    }

    public function password(): EncryptedCardAccountPassword
    {
        return $this->password;
    }

    public function cardId(): CardId
    {
        return $this->cardId;
    }
}