<?php

namespace App\Domains\CardLog;

class UsedPlace
{
    private $usedPlace;

    public function __construct(string $usedPlace)
    {
        $this->usedPlace = $usedPlace;
    }

    public function value(): string
    {
        return $this->usedPlace;
    }
}