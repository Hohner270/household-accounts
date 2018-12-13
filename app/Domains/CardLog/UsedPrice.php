<?php

namespace App\Domains\CardLog;

class UsedPrice
{
    /**
     * @var string $usedPrice
     */
    private $usedPrice;

    /**
     * @param string $usedPrice
     */
    public function __construct(string $usedPrice)
    {
        $this->usedPrice = $usedPrice;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->usedPrice;
    }
}