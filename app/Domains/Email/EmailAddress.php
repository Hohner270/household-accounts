<?php

namespace App\Domains\Email;

use App\Exceptions\InitializeException;
use App\Domains\Email\EmailSpec;

class EmailAddress
{
    private $address;

    public function __construct(string $address)
    {
        if (! EmailSpec::canEmailAddress($address)) throw new InitializeException('Invalid value : ' . $address);
        if (! EmailSpec::canEmailAddressLength($address)) throw new InitializeException('Invalid length : ' . $address);

        $this->address = $address;
    }

    public function address(): string
    {
        return $this->address;
    }

    public static function of(string $address): self
    {
        return new static($address);
    }
}