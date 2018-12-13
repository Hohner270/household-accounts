<?php

namespace App\Domains\Account;

use App\Exceptions\InitializeException;

class AccountHashedPassword
{
    /**
     * @var string $hashedPassword
     */
    private $hashedPassword;

    /**
     * @param string $hashedPassword
     */
    public function __construct(string $hashedPassword)
    {
        if (! AccountSpec::canPasswordLength($hashedPassword)) throw new InitializeException('Invalid Length: ' . $hashedPassword);
        $this->hashedPassword = $hashedPassword;
    }

    /**
     * @return string $hashedPassword
     */
    public function value(): string
    {
        return $this->hashedPassword;
    }
}