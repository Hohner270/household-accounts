<?php

namespace App\Services\CardLog;

use App\Domains\CardLog\CardLogs;
use App\Domains\CardLog\CardLogFindRepository;

use App\Domains\Account\Account;

class FindUserCardLogs
{
    private $cardLogRepo;

    public function __construct(CardLogFindRepository $cardLogFindRepo)
    {
        $this->cardLogFindRepo = $cardLogFindRepo;
    }
    
    public function __invoke(Account $account): CardLogs
    {
        $accountId = $account->id();
        
        $cardLogs = $this->cardLogFindRepo->findAllThisMonthByAccountId($accountId);
        return $cardLogs;
    }
}