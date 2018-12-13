<?php

namespace App\Domains\Account;

use App\Domains\Account\Account;
use App\Domains\Account\AccountName;
use App\Domains\Email\EmailAddress;
use App\Domains\Account\AccountHashedPassword;

interface AccountRepository
{
    /**
     * @param AccountName $accountName
     * @param EmailAddress $emailAddress
     * @param AccountHashedPassword $accountPassword
     * @return Account
     */
    public function store(AccountName $accountName, EmailAddress $emailAddress, AccountHashedPassword $accountPassword): Account;
}