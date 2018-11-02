<?php

namespace App\Domains\CardLog;

class UsedPrice
{
    private $usedPrice;

    public function __construct(string $usedPrice)
    {
        $this->usedPrice = $usedPrice;
    }

    public function value(): string
    {
        return $this->usedPrice;
    }
}