<?php

namespace App\Services\Account;

use Illuminate\Support\Facades\Hash;

use App\Domains\Account\Account;
use App\Domains\Account\AccountName;
use App\Domains\Email\EmailAddress;
use App\Domains\Account\AccountPassword;
use App\Domains\Account\AccountRepository;
use App\Domains\Account\SessionAccountRepository;

class RegisterAccount
{
    private $accountRepo;
    private $sessionRepo;

    public function __construct(AccountRepository $accountRepo, SessionAccountRepository $sessionRepo)
    {
        $this->accountRepo = $accountRepo;
        $this->sessionRepo = $sessionRepo;
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
        $password = new AccountPassword($password);
        
        $account = $this->accountRepo->store(
            new AccountName($accountName),
            new EmailAddress($email),
            $password->hash()
        );

        $this->sessionRepo->store($account);

        return $account;
    }
}