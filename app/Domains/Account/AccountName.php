<?php

namespace App\Domains\Account;

use App\Exceptions\InitializeException;
use App\Domains\Account\AccountSpec;

class AccountName
{
    private $accountName;

    public function __construct(string $accountName)
    {
        if (! AccountSpec::canAccountName($accountName)) throw new InitializeException('Invalid value: ' . $accountName);
        if (! AccountSpec::canAccountNameLength($accountName)) throw new InitializeException('Invalid length: ' . $accountName);

        $this->accountName = $accountName;
    }

    public function accountName(): string
    {
        return $this->accountName;
    }

    public static function of(string $accountName): self
    {
        return new static($accountName);
    }
}