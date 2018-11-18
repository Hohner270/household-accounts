<?php

namespace App\Domains\CardLog;

use App\Domains\Account\AccountId;

interface CardLogFindRepository
{
    public function findById();
    public function findAllThisMonthByAccountId(AccountId $accountId): CardLogs;
}