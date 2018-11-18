<?php

namespace App\Domains\CardAccount;

interface CardAccountRepository
{
    public function store(CardId $cardId, AccountId $accountId, CardAccountId $cardAccountId, CardAccountPassword $cardAccountPassword): CardAccount
}