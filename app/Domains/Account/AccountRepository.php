<?php

namespace App\Domains\Account;

use App\Domains\Account\AccountName;
use App\Domains\Email\EmailAddress;
use App\Domains\Account\AccountPassword;

interface AccountRepository
{
    public function store(AccountName $accountName, EmailAddress $emailAddress, AccountPassword $accountPassword);
    public function findByEmail(EmailAddress $email);
}