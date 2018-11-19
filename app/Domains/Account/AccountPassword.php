<?php

namespace App\Domains\Account;

use App\Exceptions\InitializeException;

use App\Domains\Account\AccountHashedPassword;

class AccountPassword
{
    private $password;

    public function __construct(string $password)
    {
        if (! AccountSpec::canPassword($password)) throw new InitializeException('Invalid value: ' . $password);
        if (! AccountSpec::canPasswordLength($password)) throw new InitializeException('Invalid Length: ' . $password);
        $this->password = $password;
    }

    public function value(): string
    {
        return $this->password;
    }

    public function hash(): AccountHashedPassword
    {
        return new AccountHashedPassword(password_hash($this->password, PASSWORD_DEFAULT));
    }
}