<?php

namespace App\Services;

use App\Domains\Account\AccountRepository;

class SignIn
{
    private $accountRepo;
    
    public function __construct(AccountRepository $accountRepo)
    {
        $this->accountRepo = $accountRepo;
    }

    public function __invoke()
    {
        return;
    }
}
