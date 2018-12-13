<?php

namespace App\Domains\CardAccount;

use App\Domains\Account\AccountId;

use App\Domains\Card\CardId;

use App\Domains\CardAccount\EncryptedCardAccountId;
use App\Domains\CardAccount\EncryptedCardAccountPassword;

interface CardAccountRepository
{
    /**
     * @param CardId $cardId
     * @param AccountId $accountId
     * @param EncryptedCardAccountId $encryptedCardAccountId
     * @param EncryptedCardAccountPassword $encryptedCardAccountPassword
     * @return CardAccount
     */
    public function store(CardId $cardId, AccountId $accountId, EncryptedCardAccountId $encryptedCardAccountId, EncryptedCardAccountPassword $encryptedCardAccountPassword): CardAccount;
}