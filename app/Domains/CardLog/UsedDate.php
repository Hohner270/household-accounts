<?php

namespace App\Domains\CardLog;

class UsedDate
{
    private $usedDate;

    public function __construct(string $usedDate)
    {
        $this->usedDate = $usedDate;
    }

    public function value(): string
    {
        return $this->usedDate;
    }
}