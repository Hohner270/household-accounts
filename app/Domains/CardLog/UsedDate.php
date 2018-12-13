<?php

namespace App\Domains\CardLog;

class UsedDate
{
    /**
     * @var string $usedDate;
     */
    private $usedDate;

    /**
     * @var string $usedDate;
     */
    public function __construct(string $usedDate)
    {
        $this->usedDate = $usedDate;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->usedDate;
    }
}