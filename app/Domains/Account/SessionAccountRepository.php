<?php

namespace App\Domains\Account;

use App\Domains\Account;

interface SessionAccountRepository
{
    /**
     * @return Account
     */
    public function find(): Account;

    /**
     * @param Account $account
     * @return void
     */
    public function store(Account $account): void;
}