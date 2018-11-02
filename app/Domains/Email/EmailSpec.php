<?php

namespace App\Domains\Email;

use App\Domains\Stringize;

class EmailSpec
{
    const ADDRESS_MIN_LENGTH = 1;
    const ADDRESS_MAX_LENGTH = 255;

    public static function canEmailAddress(string $address): bool
    {
        return preg_match('/^[a-zA-Z0-9\.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/', $address) > 0;
    }

    public static function canEmailAddressLength(string $address): bool
    {
        return Stringize::between($address, self::ADDRESS_MIN_LENGTH, self::ADDRESS_MAX_LENGTH);
    }
}