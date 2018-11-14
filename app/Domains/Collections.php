<?php

namespace App\Domains;

use Illuminate\Support\Collection;

abstract class Collections
{
    protected $domains;

    public function __construct()
    {
        $this->domains = collect();
    }

    public function collect(): Collection
    {
        return clone $this->domains;
    }
}