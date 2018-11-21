<?php

namespace App\Services\Auth;

use App\Domains\Account\SessionAccountRepository;
use App\Domains\Account\Account;

trait AccountTrait
{
    public function getAccount(): Account
    {
        $sessionRepo = \App::make(SessionAccountRepository::class);
        
        try {
            $account = $sessionRepo->find();
        } catch (NotFoundException $e) {
            return redirect('/signIn');
        }

        return $account;
    }
}