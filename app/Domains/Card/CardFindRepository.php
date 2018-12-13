<?php

namespace App\Domains\Card;

interface CardFindRepository
{
    /**
     * @param CardId $cardId
     * @return Card
     */
    public function findById(CardId $cardId): Card;

    /**
     * @return Cards
     */
    public function findAll(): Cards;
}
