<?php

namespace App\Infrastructures\Repositories\Domains\Account;

use App\Infrastructures\Eloquents\EloquentAccount;

use App\Domains\Account\Account;
use App\Domains\Account\AccountName;
use App\Domains\Email\EmailAddress;
use App\Domains\Account\AccountPassword;
use App\Domains\Account\AccountRepository;

class EloquentAccountRepositoryImpl implements AccountRepository
{
    private $eloquentAccount;

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
    public function store(AccountName $accountName, EmailAddress $emailAddress, AccountPassword $accountPassword): Account
    {
        $this->eloquentAccount->name = $accountName->accountName();
        $this->eloquentAccount->email = $emailAddress->address();
        $this->eloquentAccount->password = $accountPassword->password();
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