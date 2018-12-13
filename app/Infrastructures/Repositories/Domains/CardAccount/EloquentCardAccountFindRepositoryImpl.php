<?php

namespace App\Infrastructures\Repositories\Domains\CardAccount;

use App\Domains\Account\AccountId;

use App\Domains\CardAccount\CardAccount;
use App\Domains\CardAccount\CardAccounts;
use App\Domains\CardAccount\CardAccountFindRepository;

use App\Infrastructures\Eloquents\EloquentCardAccount;

class EloquentCardAccountFindRepositoryImpl implements CardAccountFindRepository
{
    /**
     * @var EloquentCardAccount Eloquentカードアカウントモデル
     */
    private $eloquent;

    /**
     * @param EloquentCardAccount Eloquentカードアカウントモデル
     */
    public function __construct(EloquentCardAccount $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @param AccountId アカウントID
     * @return CardAccounts カードアカウントドメイン(複数)
     */
    public function findByAccountId(AccountId $accountId): CardAccounts
    {
        $records = $this->eloquent->where('user_id', $accountId->value())->get();
        return $this->eloquent->toDomains($records);
    }
}