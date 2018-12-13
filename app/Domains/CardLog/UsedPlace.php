<?php

namespace App\Domains\CardLog;

class UsedPlace
{
    /**
     * @var string $usedPlace
     */
    private $usedPlace;

    /**
     * @param string $usedPlace
     */
    public function __construct(string $usedPlace)
    {
        $this->usedPlace = $usedPlace;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->usedPlace;
    }
}