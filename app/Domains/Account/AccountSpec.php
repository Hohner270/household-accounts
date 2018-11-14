<?php

namespace App\Domains\Account;

use App\Domains\Stringize;

class AccountSpec
{
    const NAME_MIN_LENGTH = 1;
    const NAME_MAX_LENGTH = 60;
    const ALIAS_MIN_LENGTH = 1;
    const ALIAS_MAN_LENGTH = 100;
    const PASSWORD_MIN_LENGTH = 8;
    const PASSWORD_MAX_LENGTH = 60;

    public static function canAccountName(string $accountName): bool
    {
        return preg_match('/^[ぁ-んァ-ンーa-zA-Z一-龠々0-9]+$/u', $accountName) > 0;
    }

    public static function canAccountNameLength(string $accountName): bool
    {
        return Stringize::between($accountName, self::NAME_MIN_LENGTH, self::NAME_MAX_LENGTH);
    }

    public static function canAccountAlias(string $accountAlias): bool
    {
        return preg_match('/^[a-zA-Z0-9]+$/u', $accountAlias) > 0;
    }

    public static function canAccountAliasLength(string $accountAlias): bool
    {
        return Stringize::between($accountAlias, self::ALIAS_MIN_LENGTH, self::ALIAS_MAX_LENGTH);
    }

    public static function canPassword(string $password)
    {
        return preg_match('/^[a-zA-Z0-9]+$/', $password);
    }

    public static function canPasswordLength(string $password)
    {
        return Stringize::between($password, self::PASSWORD_MIN_LENGTH, self::PASSWORD_MAX_LENGTH);
    }
}