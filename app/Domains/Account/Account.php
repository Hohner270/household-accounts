<?php

namespace App\Domains\Account;

use App\Domains\Account\AccountId;
use App\Domains\Email\EmailAddress;
use App\Domains\Account\AccoutName;
use App\Domains\Account\AccountAlias;

class Account
{
    private $id;
    private $emailAddress;
    private $accountName;

    public function __construct(AccountId $id, AccountName $accountName, EmailAddress $emailAddress)
    {
        $this->id = $id;
        $this->emailAddress = $emailAddress;
        $this->accountName = $accountName;
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

    public function isSamePassword()
    {
        
    }
}