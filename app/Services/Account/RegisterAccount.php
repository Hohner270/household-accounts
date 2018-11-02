<?php

namespace App\Services\Account;

use Illuminate\Support\Facades\Hash;

use App\Domains\Account\Account;
use App\Domains\Account\AccountName;
use App\Domains\Email\EmailAddress;
use App\Domains\Account\AccountPassword;
use App\Domains\Account\AccountRepository;

class RegisterAccount
{
    private $accountRepo;

    public function __construct(AccountRepository $accountRepo)
    {
        $this->accountRepo = $accountRepo;
    }

    /**
     * ユーザー登録
     * @param String アカウント名
     * @param String メールアドレス
     * @param String パスワード
     * @return Account アカウントドメイン
     * 
     * */ 
    public function __invoke(string $accountName, string $email, string $password): Account
    {
        return $this->accountRepo->register(
            new AccountName($accountName),
            new EmailAddress($email),
            new AccountPassword($password)
        );
    }
}