<?php

namespace App\Domains\Account;

use App\Domains\Account\AccountId;
use App\Domains\Email\EmailAddress;
use App\Domains\Account\AccoutName;
use App\Domains\Account\AccountPassword;
use App\Domains\Account\AccoutHashedPassword;

use App\Domains\CardAccount\CardAccounts;

class Account
{
    private $id;
    private $emailAddress;
    private $accountName;
    private $password;
    private $cardAccounts;

    public function __construct(AccountId $id, AccountName $accountName, EmailAddress $emailAddress, AccountHashedPassword $password, CardAccounts $cardAccounts)
    {
        $this->id = $id;
        $this->emailAddress = $emailAddress;
        $this->accountName = $accountName;
        $this->password = $password;
        $this->cardAccounts = $cardAccounts;
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

    public function cardAccounts(): CardAccounts
    {
        return $this->cardAccounts;
    }

    public function isSamePassword(AccountPassword $password): bool
    {
        return password_verify($password->value(), $this->password()->value());
    }
}