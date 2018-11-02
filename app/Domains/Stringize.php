<?php

namespace App\Domains;

class Stringize
{
    public static function between(string $string, int $min, int $max): bool
    {
        return $min <= mb_strlen($string) &&  mb_strlen($string) <= $max;
    }
}