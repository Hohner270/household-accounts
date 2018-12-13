<?php

namespace App\Domains\Card;

use App\Domains\Card\CardId;
use App\Domains\Card\CardName;

class Card
{
    /**
     * @var int EPOS_CARD
     */
    const EPOS_CARD = 1;
    
    /**
     * @var CardId $id
     */
    private $id;

    /**
     * @var CardName $cardName
     */
    private $cardName;

    /**
     * @param CardId $id
     * @param CardName $cardName
     */
    public function __construct(CardId $id, CardName $cardName)
    {
        $this->id = $id;
        $this->cardName = $cardName;
    }

    /**
     * @return CardId
     */
    public function id(): CardId
    {
        return $this->id;
    }

    /**
     * @return CardName
     */
    public function cardName(): CardName
    {
        return $this->cardName;
    }
}