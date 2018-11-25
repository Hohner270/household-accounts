<?php

namespace App\Services\Auth;

use App\Domains\Account\AccountFindRepository;
use App\Domains\Account\SessionAccountRepository;
use App\Domains\Account\Account;
use App\Domains\Account\AccountPassword;

use App\Domains\Email\EmailAddress;

use App\Domains\CardAccount\CardAccountFindRepository;

class SignIn
{
    private $accountFindRepo;
    private $sessionRepo;
    private $cardAccountFindRepo;
    
    public function __construct(AccountFindRepository $accountFindRepo, SessionAccountRepository $sessionRepo, CardAccountFindRepository $cardAccountFindRepo)
    {
        $this->accountFindRepo = $accountFindRepo;
        $this->sessionRepo = $sessionRepo;
        $this->cardAccountFindRepo = $cardAccountFindRepo;
        
    }

    public function __invoke(string $email, string $password): ?Account
    {
        $account = $this->accountFindRepo->findByEmail(new EmailAddress($email));
        
        $password = new AccountPassword($password);
        if (! $account->isSamePassword($password)) {
            return null;
        }

        $cardAccounts = $this->cardAccountFindRepo->findByAccountId($account->id());
        foreach ($cardAccounts->collect() as $cardAccount) {
            $account->cardAccounts()->add($cardAccount);
        }

        $this->sessionRepo->store($account);
        return $account;
    }
}
