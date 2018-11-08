<?php

namespace App\Domains\Account;

interface SessionAccountRepository
{
    public function find();
    public function store(Account $account);
}