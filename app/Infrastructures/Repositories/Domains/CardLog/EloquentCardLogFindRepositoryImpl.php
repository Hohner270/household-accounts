<?php

namespace App\Infrastructures\Repositories\Domains\CardLog;

use App\Infrastructures\Eloquents\EloquentCardLog;

use App\Domains\CardLog\CardLogs;
use App\Domains\CardLog\CardLogFindRepository;

use App\Domains\Account\AccountId;

class EloquentCardLogFindRepositoryImpl implements CardLogFindRepository
{
    private $eloquent;
    
    public function __construct(EloquentCardLog $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function findById()
    {
        return;
    }

    public function findAllThisMonthByAccountId(AccountId $accountId): CardLogs
    {
        $records = $this->eloquent
            ->where('user_id', $accountId->value())
            ->whereRaw('DATE_FORMAT( ADDDATE(CURDATE(), INTERVAL -1 MONTH), "%Y-%m-01" ) <= used_date')
            ->whereRaw('used_date <=  LAST_DAY( ADDDATE(CURDATE(), INTERVAL -1 MONTH) )')
            ->get();

        return $this->eloquent->toDomains($records);
    }
}
