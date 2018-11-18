<?php

namespace App\Domains\Account;

use App\Exceptions\InitializeException;

class AccountHashedPassword
{
    private $hashedPassword;

    public function __construct(string $hashedPassword)
    {
        if (! AccountSpec::canPasswordLength($hashedPassword)) throw new InitializeException('Invalid Length: ' . $hashedPassword);
        $this->hashedPassword = $hashedPassword;
    }

    public function value(): string
    {
        return $this->hashedPassword;
    }
}