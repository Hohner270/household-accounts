<?php

namespace App\Domains\CardLog;

use App\Domains\Collections;

class CardLogs extends Collections
{
    public function add(CardLog $cardLog)
    {
        $this->domains->push($cardLog);
    }

    public function total(): int
    {
        $price = 0;
        foreach ($this->domains as $cardLog) {
            $price += $cardLog->usedPrice()->value();
        }

        return $price;
    }
}