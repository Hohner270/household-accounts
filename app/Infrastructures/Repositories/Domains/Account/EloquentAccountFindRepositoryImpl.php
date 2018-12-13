<?php

namespace App\Infrastructures\Repositories\Domains\Account;

use App\Infrastructures\Eloquents\EloquentAccount;

use App\Domains\Account\Account;
use App\Domains\Email\EmailAddress;
use App\Domains\Account\AccountFindRepository;

class EloquentAccountFindRepositoryImpl implements AccountFindRepository
{
    /**
     * @var EloquentAccount Eloquentアカウントモデル
     */
    private $eloquentAccount;

    /**
     * @param EloquentAccount Eloquentアカウントモデル
     */
    public function __construct(EloquentAccount $eloquentAccount)
    {
        $this->eloquentAccount = $eloquentAccount;
    }

    /** 
     * @param EmailAddress アドレス
     * @return Account アカウントドメイン
     */
    public function findByEmail(EmailAddress $email): Account
    {
        $record = $this->eloquentAccount->where('email', $email->value())->first();
        $account = $record->toDomain();
        return $account;
    }
}