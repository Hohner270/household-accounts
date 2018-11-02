<?php

namespace App\Domains\CardLog;

use Illuminate\Support\Collection;

class CardLogs
{
    private $cardLogs;

    public function __construct()
    {
        $this->cardLogs = collect();
    }

    public function add(CardLog $cardLog)
    {
        $this->cardLogs->push($cardLog);
    }

    public function collect(): Collection
    {
        return clone $this->cardLogs;
    }
}