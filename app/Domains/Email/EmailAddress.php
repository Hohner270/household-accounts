<?php

namespace App\Domains\Email;

use App\Exceptions\InitializeException;
use App\Domains\Email\EmailSpec;

class EmailAddress
{
    /**
     * @var string $address
     */
    private $address;

    /**
     * @param string $address
     */
    public function __construct(string $address)
    {
        if (! EmailSpec::canEmailAddress($address)) throw new InitializeException('Invalid value : ' . $address);
        if (! EmailSpec::canEmailAddressLength($address)) throw new InitializeException('Invalid length : ' . $address);

        $this->address = $address;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->address;
    }
}