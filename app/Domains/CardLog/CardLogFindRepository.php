<?php

namespace App\Domains\CardLog;

use App\Domains\Account\AccountId;
use App\Domains\CardLog\CardLogs;

interface CardLogFindRepository
{
    /**
     * @param AccountId $accountId
     * @return CardLogs
     */
    public function findAllThisMonthByAccountId(AccountId $accountId): CardLogs;
}