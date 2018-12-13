<?php

namespace App\Domains\Account;

use App\Domains\Account\Account;
use App\Domains\Email\EmailAddress;

interface AccountFindRepository
{
    /**
     * @param EmailAddress $email
     */
    public function findByEmail(EmailAddress $email): Account;
}