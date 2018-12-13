<?php

namespace App\Domains\CardLog;

class UsedContent
{
    /**
     * @var string $usedContent
     */
    private $usedContent;

    /**
     * @param string $usedContent
     */
    public function __construct(string $usedContent)
    {
        $this->usedContent = $usedContent;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->usedContent;
    }
}