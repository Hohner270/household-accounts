<?php

namespace App\Services\Auth;

use App\Domains\Account\AccountFindRepository;
use App\Domains\Account\SessionAccountRepository;
use App\Domains\Account\Account;
use App\Domains\Account\AccountPassword;
use App\Domains\Email\EmailAddress;

class SignIn
{
    private $accountFindRepo;
    private $sessionRepo;
    
    public function __construct(AccountFindRepository $accountFindRepo, SessionAccountRepository $sessionRepo)
    {
        $this->accountFindRepo = $accountFindRepo;
        $this->sessionRepo = $sessionRepo;
    }

    public function __invoke(string $email, string $password): ?Account
    {
        $account = $this->accountFindRepo->findByEmail(new EmailAddress($email));
        
        $password = new AccountPassword($password);
        if (! $account->isSamePassword($password)) {
            return null;
        }

        $this->sessionRepo->store($account);
        return $account;
    }
}
