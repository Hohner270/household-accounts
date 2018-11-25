<?php

namespace App\Infrastructures\Repositories\Domains\CardAccount;

use App\Domains\Account\AccountId;

use App\Domains\CardAccount\CardAccount;
use App\Domains\CardAccount\CardAccounts;
use App\Domains\CardAccount\CardAccountFindRepository;

use App\Infrastructures\Eloquents\EloquentCardAccount;

class EloquentCardAccountFindRepositoryImpl implements CardAccountFindRepository
{
    private $eloquent;

    public function __construct(EloquentCardAccount $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function findByAccountId(AccountId $accountId): CardAccounts
    {
        $records = $this->eloquent->where('user_id', $accountId->value())->get();
        return $this->eloquent->toDomains($records);
    }
}