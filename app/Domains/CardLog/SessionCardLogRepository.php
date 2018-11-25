<?php

namespace App\Domains\CardLog;

use App\Domains\CardLog\CardLogs;
use App\Domains\Account\AccountId;

interface SessionCardLogRepository
{
    public function find(AccountId $accountId): CardLogs;
    public function store(CardLogs $cardLogs, AccountId $accountId);
}