<?php

namespace App\Infrastructures\Repositories\Domains\Account;

use App\Infrastructures\Eloquents\EloquentAccount;

use App\Domains\Account\Account;
use App\Domains\Account\AccountName;
use App\Domains\Email\EmailAddress;
use App\Domains\Account\AccountHashedPassword;
use App\Domains\Account\AccountRepository;

class EloquentAccountRepositoryImpl implements AccountRepository
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
     * ユーザー登録
     * @param AccountName アカウント名
     * @param EmailAddress emailアドレス
     * @param AccountPasword アカウントパスワード
     * @return Account アカウントドメイン
     * 
     * */ 
    public function store(AccountName $accountName, EmailAddress $emailAddress, AccountHashedPassword $accountHashedPassword): Account
    {
        $this->eloquentAccount->name = $accountName->value();
        $this->eloquentAccount->email = $emailAddress->value();
        $this->eloquentAccount->password = $accountHashedPassword->value();
        $this->eloquentAccount->save();

        return $this->eloquentAccount->toDomain();
    }
    /** 
     * @param EmailAddress アドレス
     * @return Account アカウントドメイン
     */
    public function findByEmail(EmailAddress $email): Account
    {
        $account = $this->eloquentAccount->where('email', $email);
        return $account;
    }
}