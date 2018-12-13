<?php

namespace App\Domains\Account;

use Illuminate\Support\Collection;

use App\Domains\Collections;

class Accounts extends Collections
{
    /**
     * @param Account $account
     */
    public function add(Account $account)
    {
        $this->domains->push($account);
    }
}