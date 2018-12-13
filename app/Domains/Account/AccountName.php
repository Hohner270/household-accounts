<?php

namespace App\Domains\Account;

use App\Exceptions\InitializeException;
use App\Domains\Account\AccountSpec;

class AccountName
{
    /**
     * @var string $accountName
     */
    private $accountName;

    /**
     * @param string $accountName
     */
    public function __construct(string $accountName)
    {
        if (! AccountSpec::canAccountName($accountName)) throw new InitializeException('Invalid value: ' . $accountName);
        if (! AccountSpec::canAccountNameLength($accountName)) throw new InitializeException('Invalid length: ' . $accountName);

        $this->accountName = $accountName;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->accountName;
    }
}