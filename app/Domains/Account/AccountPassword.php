<?php

namespace App\Domains\Account;

use App\Exceptions\InitializeException;

class AccountPassword
{
    private $password;

    public function __construct(string $password)
    {
        if (! AccountSpec::canPassword($password)) throw new InitializeException('Invalid value: ' . $password);
        if (! AccountSpec::canPasswordLength($password)) throw new InitializeException('Invalid Length: ' . $password);
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function password(): string
    {
        return $this->password;
    }
}