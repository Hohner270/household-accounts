<?php

namespace App\Domains\Card;

use App\Domains\Card\CardId;
use App\Domains\Card\CardName;

class Card
{
    private $id;
    private $cardName;

    public function __construct(CardId $id, CardName $cardName)
    {
        $this->id = $id;
        $this->cardName = $cardName;
    }

    public function id(): CardId
    {
        return $this->id;
    }

    public function cardName(): CardName
    {
        return $this->cardName;
    }
}