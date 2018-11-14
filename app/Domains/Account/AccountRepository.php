<?php

namespace App\Domains\Account;

use App\Domains\Account\AccountName;
use App\Domains\Email\EmailAddress;
use App\Domains\Account\AccountHashedPassword;

interface AccountRepository
{
    public function store(AccountName $accountName, EmailAddress $emailAddress, AccountHashedPassword $accountPassword);
}