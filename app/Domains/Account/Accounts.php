<?php

namespace App\Domains\Account;

use Illuminate\Support\Collection;

class Accounts
{
    private $accounts;

    public function __construct()
    {
        $this->accounts = collect();
    }

    public function add(Member $member)
    {
        $this->accounts->push($member);
    }

    public function collect(): Collection
    {
        return clone $this->accounts;
    }
}