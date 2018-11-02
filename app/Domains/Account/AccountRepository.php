<?php

namespace App\Domains\Account;

use App\Domains\Account\Account;
use App\Domains\Account\AccountName;
use App\Domains\Email\EmailAddress;
use App\Domains\Account\AccountPassword;

interface AccountRepository
{
    public function register(AccountName $accountName, EmailAddress $emailAddress, AccountPassword $accountPassword);
}