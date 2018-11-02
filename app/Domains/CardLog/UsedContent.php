<?php

namespace App\Domains\CardLog;

class UsedContent
{
    private $usedContent;

    public function __construct(string $usedContent)
    {
        $this->usedContent = $usedContent;
    }

    public function value(): string
    {
        return $this->usedContent;
    }
}