<?php

namespace App\Domains\CardLog;

class StoreName
{
    /**
     * @var string $storeName
     */
    private $storeName;

    /**
     * @param string $storeName
     */
    public function __construct(string $storeName)
    {
        $this->storeName = $storeName;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->storeName;
    }
}