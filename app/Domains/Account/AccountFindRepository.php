<?php

namespace App\Domains\Account;

use App\Domains\Email\EmailAddress;

interface AccountFindRepository
{
    public function findByEmail(EmailAddress $email);
}