<?php

namespace App\Domains\CardLog;

use App\Domains\Collections;
use Illuminate\Support\Collection;

class CardLogs extends Collections
{
    /**
     * @param CardLog $cardLog
     */
    public function add(CardLog $cardLog)
    {
        $this->domains->push($cardLog);
    }

    /**
     * @return int
     */
    public function total(): int
    {
        $price = 0;
        foreach ($this->domains as $cardLog) {
            $price += $cardLog->usedPrice()->value();
        }

        return $price;
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        $cardLogList = [];
        foreach ($this->domains as $cardLog) {
            $cardLogList[] = [
                'id'           => $cardLog->id()->value(),
                'cardId'       => $cardLog->cardId()->value(),
                'payment'      => $cardLog->payment()->value(),
                'paymentTimes' => $cardLog->paymentTimes()->value(),
                'storeName'    => $cardLog->storeName()->value(),
                'usedContent'  => $cardLog->usedContent()->value(),
                'usedDate'     => $cardLog->usedDate()->value(),
                'usedPlace'    => $cardLog->usedPlace()->value(),
                'usedPrice'    => $cardLog->usedPrice()->value(),
            ];
        }
        
        return json_encode($cardLogList, JSON_FORCE_OBJECT);
    }
}