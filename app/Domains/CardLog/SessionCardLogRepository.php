<?php

namespace App\Domains\CardLog;

use App\Domains\CardLog\CardLogs;
use App\Domains\Account\AccountId;

interface SessionCardLogRepository
{
    /**
     * @param AccountId $accountId
     * @return CardLogs
     */
    public function find(AccountId $accountId): CardLogs;

    /**
     * @param CardLogs $cardLogs
     * @param AccountId $accountId
     */
    public function store(CardLogs $cardLogs, AccountId $accountId);
}