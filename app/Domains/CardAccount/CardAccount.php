<?php

namespace App\Domains\CardAccount;

use App\Domains\CardAccount\EncryptedCardAccountId;
use App\Domains\CardAccount\EncryptedCardAccountPassword;

use App\Domains\Card\CardId;

class CardAccount
{
    /**
     * @var EncryptedCardAccountId $id
     */
    private $id;

    /**
     * @var EncryptedCardAccountPassword $password
     */
    private $password;

    /**
     * @var CardId $cardId
     */
    private $cardId;

    /**
     * @param EncryptedCardAccountId $id
     * @param EncryptedCardAccountPassword $password
     * @param CardId $cardId
     */
    public function __construct(EncryptedCardAccountId $id, EncryptedCardAccountPassword $password, CardId $cardId)
    {
        $this->id = $id;
        $this->password = $password;
        $this->cardId = $cardId;
    }

    /**
     * @return EncryptedCardAccountId
     */
    public function id(): EncryptedCardAccountId
    {
        return $this->id;
    }

    /**
     * @return EncryptedCardAccountPassword
     */
    public function password(): EncryptedCardAccountPassword
    {
        return $this->password;
    }

    /**
     * @return CardId
     */
    public function cardId(): CardId
    {
        return $this->cardId;
    }
}