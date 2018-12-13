<?php

namespace App\Domains\CardAccount;

use App\Domains\Account\AccountId;

use App\Domains\CardAccount\CardAccounts;

interface CardAccountFindRepository
{
    /**
     * @param AccountId $accountId
     * @return CardAccounts
     */
    public function findByAccountId(AccountId $accountId): CardAccounts;
}