<?php

namespace App\Domains\CardLog;

class StoreName
{
    private $storeName;

    public function __construct(string $storeName)
    {
        $this->storeName = $storeName;
    }

    public function value(): string
    {
        return $this->storeName;
    }
}