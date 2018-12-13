<?php

namespace App\Domains\Card;

use App\Domains\Collections;
use App\Domains\Card\Card;

class Cards extends Collections
{
    /**
     * @param Card $card
     */
    public function add(Card $card)
    {
        $this->domains->push($card);
    }
}