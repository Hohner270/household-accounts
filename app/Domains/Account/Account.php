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
    /**
     * @var AccountId $id
     */
    private $id;

    /**
     * @var AccountName $accountName
     */
    private $accountName;

    /**
     * @var EmailAddress $emailAddress
     */
    private $emailAddress;

    /**
     * @var AccountHashedPassword $password
     */
    private $password;

    /**
     * @var CardAccounts $cardAccounts
     */
    private $cardAccounts;

    /**
     * @param AccountId $id
     * @param AccountName $accountName
     * @param EmailAddress $emailAddress
     * @param AccountHashedPassword $password
     * @param CardAccounts $cardAccounts
     */
    public function __construct(AccountId $id, AccountName $accountName, EmailAddress $emailAddress, AccountHashedPassword $password, CardAccounts $cardAccounts)
    {
        $this->id = $id;
        $this->emailAddress = $emailAddress;
        $this->accountName = $accountName;
        $this->password = $password;
        $this->cardAccounts = $cardAccounts;
    }

    /**
     * @return AccountId $id
     */
    public function id(): AccountId
    {
        return $this->id;
    }

    /**
     * @return EmailAdress $emailAddress
     */
    public function emailAddress(): EmailAdress
    {
        return $this->emailAddress;
    }

    /**
     * @return AccountName $accountName
     */
    public function accountName(): AccountName
    {
        return $this->accountName;
    }

    /**
     * @return AccountHashedPassword $password
     */
    public function password(): AccountHashedPassword
    {
        return $this->password;
    }

    /**
     * @return CardAccounts $cardAccounts
     */
    public function cardAccounts(): CardAccounts
    {
        return $this->cardAccounts;
    }

    /**
     * @param AccountPassword $password
     * @return bool true | false
     */
    public function isSamePassword(AccountPassword $password): bool
    {
        return password_verify($password->value(), $this->password()->value());
    }
}