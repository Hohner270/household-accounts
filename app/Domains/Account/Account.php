<?php

namespace App\Domains\Account;

use App\Domains\Account\AccountId;
use App\Domains\Email\EmailAddress;
use App\Domains\Account\AccoutName;
use App\Domains\Account\AccoutHashedPassword;
use App\Domains\Account\AccountAlias;

class Account
{
    private $id;
    private $emailAddress;
    private $accountName;
    private $password;

    public function __construct(AccountId $id, AccountName $accountName, EmailAddress $emailAddress, AccountHashedPassword $password)
    {
        $this->id = $id;
        $this->emailAddress = $emailAddress;
        $this->accountName = $accountName;
        $this->password = $password;
    }

    public function id(): AccountId
    {
        return $this->id;
    }

    public function emailAddress(): EmailAdress
    {
        return $this->emailAddress;
    }

    public function accountName(): AccountName
    {
        return $this->accountName;
    }

    public function password(): AccountHashedPassword
    {
        return $this->password;
    }
}