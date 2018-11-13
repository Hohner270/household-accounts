<?php

namespace App\Services;

use App\Domains\Account\AccountRepository;
use App\Domains\Account\SessionAccountRepository;

use App\Domains\Email\EmailAddress;

class SignIn
{
    private $accountRepo;
    private $sessionRepo;
    
    public function __construct(AccountRepository $accountRepo, SessionAccountRepository $sessionRepo)
    {
        $this->accountRepo = $accountRepo;
        $this->sessionRepo = $sessionRepo;
    }

    public function __invoke(EmailAddress $email)
    {
        $account = $this->accountRepo->findByEmail($email);
        $this->sessionRepo->store($account);
        
        return $account;
    }
}
